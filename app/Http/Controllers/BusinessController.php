<?php

namespace App\Http\Controllers;

use JeroenDesloovere\VCard\VCard;
use App\Models\Business;
use App\Models\Plan;
use App\Models\Businessfield;
use App\Models\Utility;
use App\Models\business_hours;
use App\Models\appoinment;
use App\Models\service;
use App\Models\social;
use App\Models\User;
use App\Models\ContactInfo;
use App\Models\testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;
use File;
use Illuminate\Validation\Rules;
use Session;
use Flash;

class BusinessController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        if(Auth::user()->type == 'super admin'){
            
//            $business = Business::orderBy('id', 'DESC')->get();
//            
//            ->join('users', 'plan_orders.user_id', '=', 'users.id')
                    
                    
                    
            $business = Business::select(
                [
                    'businesses.*',
                    'users.name as user_name',
                    'users.email as user_email',
                ]
            )->join('users', 'businesses.created_by', '=', 'users.id')->orderBy('businesses.id', 'DESC')->get();
             
                    
            
        }else{   
            
            $business = Business::where('created_by', \Auth::user()->id)->orderBy('id', 'DESC')->get();
        
        }
        
//         dd($business);
        $no = 0;
        foreach ($business as $key => $value) {
            $value->no = $no;
            $no++;
        }
        return view('business.index', compact('business'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $businessfields = Utility::getFields();
        return view('business.create', compact('businessfields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

//        var_dump($request);
//        die;

        $max_business = \Auth::user()->getMaxBusiness();
        $count = Business::where('created_by', \Auth::user()->id)->count();
        // dd($count);
        if ($count < $max_business || $max_business == -1) {
            $validator = \Validator::make(
                            $request->all(), [
                        'title' => 'required',
                            ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $slug = Utility::createSlug('businesses', $request->title);
            // dd($slug);
            $card_theme = [];
            $card_theme['theme'] = 'theme1';
            $card_theme['order'] = Utility::getDefaultThemeOrder('theme1');
            $user = Business::create([
                        'title' => $request->title,
                        'slug' => $slug,
                        'branding_text' => 'Copyright VcardGo 2022',
                        'card_theme' => json_encode($card_theme),
                        'theme_color' => 'color1-theme1',
                        'created_by' => \Auth::user()->id
            ]);
            $user->enable_businesslink = 'on';
            $user->is_branding_enabled = 'on';
            //  dd($user);
            $user->save();
            return redirect()->back()->with('success', __('Business Created Successfully'));
        } else {
            return redirect()->back()->with('error', __('Your user business is over, Please upgrade plan.'));
        }
    }

    public function registration_store(Request $request) {

//        var_dump($request);
//        die;

//        $max_business = \Auth::user()->getMaxBusiness();
//        $count = Business::where('created_by', \Auth::user()->id)->count();
//        // dd($count);
//        if ($count < $max_business || $max_business == -1) {
            $validator = \Validator::make(
                            $request->all(), [
                            'title' => 'required',
                            'category_id' => 'required',
                            'subcategory_id' => 'required',
                            ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $slug = Utility::createSlug('businesses', $request->title);
            // dd($slug);
            $card_theme = [];
            $card_theme['theme'] = 'theme1';
            $card_theme['order'] = Utility::getDefaultThemeOrder('theme1');
            $user = Business::create([
                        'title' => $request->title,
                        'slug' => $slug,
                        'category_id' => $request->category_id,
                        'subcategory_id' => $request->subcategory_id,
                        'branding_text' => 'Copyright VcardGo 2022',
                        'card_theme' => json_encode($card_theme),
                        'theme_color' => 'color1-theme1',
                        'created_by' => \Auth::user()->id
            ]);
            $user->enable_businesslink = 'on';
            $user->is_branding_enabled = 'on';
            //  dd($user);
            $user->save();
            
            
            return redirect()->back()->with('success', __('Business Created Successfully'));
            
            
//        } else {
//            return redirect()->back()->with('error', __('Your user business is over, Please upgrade plan.'));
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business, $id) {
        
        
        if(Auth::user()->type == 'super admin'){
            
           
        }else{
        
            
            
            $count = Business::where('id', $id)->where('created_by', \Auth::user()->id)->count();
            if ($count == 0) {
                return redirect()->route('business.index')->with('error', __('This card number is not yours.'));
            }
        
        }
        
        $business = Business::where('id', $id)->first();
        if ($business != NULL) {
            
            
            $user = User::where('id', $business->created_by)->first(); 
            
//            var_dump($user->getPlanThemes());
            
            if (json_decode($business->card_theme) == NULL) {
                $card_order = [];
                $card_order['theme'] = $business->card_theme;
                $card_order['order'] = Utility::getDefaultThemeOrder($business->card_theme);
                $business->card_theme = json_encode($card_order);
                $business->save();
            }
            
            
            $businessfields = Utility::getFields();
            $businesshours = business_hours::where('business_id', $id)->first();
            $appoinment = appoinment::where('business_id', $id)->first();
            // dd($appoinment);

            $appoinment_hours = [];

            if (!empty($appoinment->content)) {
                $appoinment_hours = json_decode($appoinment->content);
            }
            $contactinfo = ContactInfo::where('business_id', $id)->first();
            $contactinfo_content = [];
            if (!empty($contactinfo->content)) {
                $contactinfo_content = json_decode($contactinfo->content);
            }
            $services = service::where('business_id', $id)->first();
            $services_content = [];
            if (!empty($services->content)) {
                $services_content = json_decode($services->content);
            }
            $testimonials = testimonial::where('business_id', $id)->first();

            $testimonials_content = [];
            if (!empty($testimonials->content)) {
                $testimonials_content = json_decode($testimonials->content);
            }
            $sociallinks = social::where('business_id', $id)->first();
            $social_content = [];
            if (!empty($sociallinks->content)) {
                $social_content = json_decode($sociallinks->content);
            }
            $days = business_hours::$days;
            $business_hours = [];
            if (!empty($businesshours->content)) {
                $business_hours = json_decode($businesshours->content);
            }

            $customhtml = Business::where('id', $id)->first();

            $custom_html = [];
            if (!empty($customhtml->custom_html_text)) {
                $custom_html = json_decode($customhtml->custom_html_text);
            }

            $branding = Business::where('id', $id)->first();

            $branding = [];
            if (!empty($branding->branding_text)) {
                $branding = json_decode($branding->branding_text);
            }
            $plan = Plan::where('id', $id)->first();

            // $plan = [];
            // if(!empty($branding->branding_text))
            // {
            //     $branding = json_decode($branding->branding_text);
            // }

            $serverName = str_replace(
                    [
                        'http://',
                        'https://',
                    ], '', env('APP_URL')
            );
            $serverIp = gethostbyname($serverName);

            if ($serverIp == $_SERVER['SERVER_ADDR']) {
                $serverIp;
            } else {
                $serverIp = request()->server('SERVER_ADDR');
            }
            $plan = Plan::where('id', $user->plan)->first();
            $app_url = trim(env('APP_URL'), '/');
            $business_url = $app_url . '/' . $business['slug'];
            if (!empty($business->enable_subdomain) && $business->enable_subdomain == 'on') {
                // Remove the http://, www., and slash(/) from the URL
                $input = env('APP_URL');

                // If URI is like, eg. www.way2tutorial.com/
                $input = trim($input, '/');
                // If not have http:// or https:// then prepend it
                if (!preg_match('#^http(s)?://#', $input)) {
                    $input = 'http://' . $input;
                }

                $urlParts = parse_url($input);

                // Remove www.
                $subdomain_name = preg_replace('/^www\./', '', $urlParts['host']);
                // Output way2tutorial.com
            } else {
                $subdomain_name = str_replace(
                        [
                            'http://',
                            'https://',
                        ], '', env('APP_URL')
                );
            }
            // dd($plan);
            return view('business.edit', compact('businessfields', 'appoinment_hours', 'contactinfo', 'contactinfo_content', 'appoinment', 'services_content', 'services', 'testimonials_content', 'testimonials', 'social_content', 'sociallinks', 'businesshours', 'business_hours', 'business', 'custom_html', 'customhtml', 'branding', 'branding', 'days', 'id', 'business_url', 'serverIp', 'subdomain_name', 'plan','user'));
        } else {

            return abort('404', 'Not Found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business) {
//         dd($request->all());

        if (!is_null($business)) {
            
            
            if(Auth::user()->type == 'super admin'){
            
                $user = User::where('id', $business->created_by)->first(); 
           
            }else{
            
                $count = Business::where('id', $business->id)->where('created_by', \Auth::user()->id)->count();
                if ($count == 0) {
                    return redirect()->route('business.index')->with('error', __('This card number is not yours.'));
                }
                
            }
            
            
            if (is_null($business->banner_new) || is_null($business->logo_new)) {
                $validator = \Validator::make(
                                $request->all(), [
                                    'banner_new' => 'required',
                                    'logo_new' => 'required',
                                    'title' => 'required',
                                    'sub_title' => 'required',
                                ]
                );
                
                
                if ($validator->fails()) {
                    
//                    dd($validator);
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }
            }
            
            
//            if (is_null($business->banner) || is_null($business->logo)) {
//                $validator = \Validator::make(
//                                $request->all(), [
//                                    'banner' => 'required',
//                                    'logo' => 'required',
//                                    'title' => 'required',
//                                    'sub_title' => 'required',
//                                ]
//                );
//                
//                
//                if ($validator->fails()) {
//                    
////                    dd($validator);
//                    $messages = $validator->getMessageBag();
//
//                    return redirect()->back()->with('error', $messages->first());
//                }
//            }
            
            
            
            // if(is_null($business->logo)){
            //     $this->validate(
            //         $request, ['logo' => 'required',]
            //     );
            // }
            // $this->validate(
            //     $request, [
            //         'title' => 'required',
            //         'sub_title' => 'required',
            //         ]
            //     );

//            var_dump($request->banner_new);
            if(!is_null($request->banner_new)){
                
               $banner_new = explode("photos/",$request->banner_new);
//               var_dump($banner_new);
                $business->banner_new=$banner_new[1];
            }
//            var_dump($request->logo_new);
            if(!is_null($request->logo_new)){
                
                $logo_new = explode("photos/",$request->logo_new);
//                var_dump($logo_new);
                $business->logo_new=$logo_new[1];
            }
//            dd($business->all());
            
            $count = Business::where('slug', $request->slug)->count();
            if (!is_null($business)) {
                if ($count == 0) {
                    $business->slug = $request->slug;
                } elseif ($count == 1) {
                    if ($business->slug != $request->slug) {
                        return redirect()->route('business.index')->with('error', __('Slug is already used.........!'));
                    }
                }
            }
            $business->title = $request->title;
            $business->sub_title = $request->sub_title;
            $business->description = $request->description;
            // $business->branding_text = $request->branding_text;
            if ($request->hasFile('logo')) {
                $settings = Utility::getStorageSetting();
                $logo = $request->file('logo');
                $ext = $logo->getClientOriginalExtension();
                $fileName = 'logo_' . time() . rand() . '.' . $ext;
                // $request->file('logo')->storeAs('card_logo', $fileName);
                // Storage::delete('card_logo/'.$business->logo);
                $business->logo = $fileName;
                if ($settings['storage_setting'] == 'local') {
                    $dir = 'card_logo/';
                } else {
                    $dir = 'card_logoe/';
                    // dd($dir);
                }
                $image_path = $dir . $business['logo'];
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                $path = Utility::upload_file($request, 'logo', $fileName, $dir, []);

                if ($path['flag'] == 1) {
                    $url = $path['url'];
                } else {
                    return redirect()->route('business.index', $user->id)->with('error', __($path['msg']));
                }
            }

            if ($request->hasFile('banner')) {
                // dd($request->all());
                $settings = Utility::getStorageSetting();
                $banner = $request->file('banner');
                $ext = $banner->getClientOriginalExtension();
                $fileName = 'banner' . time() . rand() . '.' . $ext;
                // $request->file('banner')->storeAs('card_banner', $fileName);
                // Storage::delete('card_banner/'.$business->banner);
                $business->banner = $fileName;
                // dd($fileName);

                if ($settings['storage_setting'] == 'local') {
                    $dir = 'card_banner/';
                } else {
                    $dir = 'card_banner/';
                    dd($dir);
                }
                $image_path = $dir . $business['banner'];
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                $path = Utility::upload_file($request, 'banner', $fileName, $dir, []);

                if ($path['flag'] == 1) {
                    $url = $path['url'];
                } else {
                    return redirect()->route('business.index', $user->id)->with('error', __($path['msg']));
                }
            }
            $business_id = $request->business_id;
            if ($request->is_business_hours_enabled == "on") {
                $requestAll = $request->all();
                $days = business_hours::$days;
                $business_hours = [];
                foreach ($days as $k => $day) {
                    $time['days'] = isset($requestAll['days_' . $k]) ? 'on' : 'off';
                    $time['start_time'] = $requestAll['start-' . $k];
                    $time['end_time'] = $requestAll['end-' . $k];
                    $business_hours[$k] = $time;
                }
                $business_hours = json_encode($business_hours);
                $businessHours = business_hours::where('business_id', $business_id)->first();
                if (!is_null($businessHours)) {
                    $businessHours->content = $business_hours;
                    $businessHours->is_enabled = '1';
                    $businessHours->created_by = $user->id;
                    $businessHours->save();
                } else {
                    business_hours::create([
                        'business_id' => $business_id,
                        'content' => $business_hours,
                        'is_enabled' => '1',
                        'created_by' => $user->id
                    ]);
                }
            } else {
                $businessHours = business_hours::where('business_id', $business_id)->first();
                if (!is_null($businessHours)) {
                    $businessHours->is_enabled = '0';
                    $businessHours->created_by = $user->id;
                    $businessHours->save();
                } else {
                    business_hours::create([
                        'business_id' => $business_id,
                        'is_enabled' => '0',
                        'created_by' => $user->id
                    ]);
                }
            }

            if ($request->is_appoinment_enabled == "on") {
                $app_hours = $request->hours;
                $appointment_count = 1;
                $appoinment_hours = [];
                $hours = [];
                if (!empty($app_hours)) {
                    foreach ($app_hours as $business_hours_key => $business_hours_val) {
                        $hours['id'] = $appointment_count;
                        $hours['start'] = $business_hours_val['start'];
                        $hours['end'] = $business_hours_val['end'];
                        $appoinment_hours[$business_hours_key] = $hours;
                        $appointment_count++;
                    }
                    $appoinment_hours = json_encode($appoinment_hours);
                    $appoinment = appoinment::where('business_id', $business_id)->first();
                    if (!is_null($appoinment)) {
                        $appoinment->content = $appoinment_hours;
                        $appoinment->is_enabled = '1';
                        $appoinment->created_by = $user->id;
                        $appoinment->save();
                    } else {
                        appoinment::create([
                            'business_id' => $business_id,
                            'content' => $appoinment_hours,
                            'is_enabled' => '1',
                            'created_by' => $user->id
                        ]);
                    }
                }
            } else {
                $appoinment = appoinment::where('business_id', $business_id)->first();
                if (!is_null($appoinment)) {
                    $appoinment->is_enabled = '0';
                    $appoinment->created_by = $user->id;
                    $appoinment->save();
                } else {
                    appoinment::create([
                        'business_id' => $business_id,
                        'is_enabled' => '0',
                        'created_by' => $user->id
                    ]);
                }
            }

            if ($request->is_services_enabled == "on") {
                //dd($request->all());
                $servicedetails = $request->services;
                $service_count = 1;
                $service_details = [];
                $details = [];
                if (!empty($servicedetails)) {
                    foreach ($servicedetails as $service_key => $service_val) {

                        $images = $request->file('services');
                        $details['id'] = $service_count;
                        $details['title'] = $service_val['title'];
                        $details['description'] = $service_val['description'];
                        $details['purchase_link'] = $service_val['purchase_link'];
                        $details['link_title'] = $service_val['link_title'];
                        if (isset($images[$service_key])) {
                            $settings = Utility::getStorageSetting();
                            $img_ext = $images[$service_key]['image']->getClientOriginalExtension();
                            $img_fileName = 'img_' . time() . rand() . '.' . $img_ext;
                            // $request->validate(['image' => 'required|mimes:png,jpeg,jpg|max:20480']);

                            $details['image'] = $img_fileName;
                            if ($settings['storage_setting'] == 'local') {
                                $dir = 'service_images/';
                            } else {
                                $dir = 'service_images/';
                                // dd($dir);
                            }
                            $image_path = $dir . $details['image'];
                            if (File::exists($image_path)) {
                                File::delete($image_path);
                            }


                            $path = Utility::keyWiseUpload_file($request, 'image', $img_fileName, $dir, 'services', $service_key, []);
                            if ($path['flag'] == 1) {
                                $url = $path['url'];
                            } else {
                                return redirect()->route('business.index', $user->id)->with('error', __($path['msg']));
                            }
                        } else {
                            if (isset($service_val['get_image']) && !is_null($service_val['get_image'])) {
                                $details['image'] = $service_val['get_image'];
                            } else {
                                $details['image'] = "";
                            }
                        }
                        $service_details[$service_key] = $details;
                        $service_count++;
                    }
                    $service_details = json_encode($service_details);
                    $services_data = service::where('business_id', $business_id)->first();
                    if (!is_null($services_data)) {
                        if ($service_details != 'null') {
                            $services_data->content = $service_details;
                            $services_data->is_enabled = '1';
                            $services_data->created_by = $user->id;
                            $services_data->save();
                        } else {
                            $services_data->is_enabled = '1';
                            $services_data->created_by = $user->id;
                            $services_data->save();
                        }
                    } else {
                        service::create([
                            'business_id' => $business_id,
                            'content' => $service_details,
                            'is_enabled' => '1',
                            'created_by' => $user->id
                        ]);
                    }
                }
            } else {
                $services_data = service::where('business_id', $business_id)->first();
                if (!is_null($services_data)) {
                    $services_data->is_enabled = '0';
                    $services_data->created_by = $user->id;
                    $services_data->save();
                } else {
                    service::create([
                        'business_id' => $business_id,
                        'is_enabled' => '0',
                        'created_by' => $user->id
                    ]);
                }
            }

            if ($request->is_testimonials_enabled == "on") {
                $testimonialsdetails = $request->testimonials;
                $testimonials_count = 1;
                $testimonials_details = [];
                $testi_details = [];
                // dd($testimonialsdetails);
                if (!empty($testimonialsdetails)) {
                    foreach ($testimonialsdetails as $testimonials_key => $testimonials_val) {
                        $testimonials_images = $request->file('testimonials');
                        $testi_details['id'] = $testimonials_count;
                        if (isset($testimonials_val['rating'])) {
                            $testi_details['rating'] = $testimonials_val['rating'];
                        } else {
                            $testi_details['rating'] = "0";
                        }
                        if (isset($testimonials_val['description']) && $testimonials_val['description'] != 'null') {
                            $testi_details['description'] = $testimonials_val['description'];
                        } else {
                            $testi_details['description'] = '';
                        }

                        if (isset($testimonials_images[$testimonials_key])) {
                            $settings = Utility::getStorageSetting();
                            $testimonials_img_ext = $testimonials_images[$testimonials_key]['image']->getClientOriginalExtension();
                            $testimonials_img_fileName = 'img_' . time() . rand() . '.' . $testimonials_img_ext;
                            $testimonials_images[$testimonials_key]['image'] = $testimonials_img_fileName;

                            // $request->validate(['image' => 'required|mimes:png,jpeg,jpg|max:20480']);

                            $dir = 'testimonials_images/';
                            $testi_details['image'] = $testimonials_img_fileName;
                            $image_path = $dir . $testimonials_images[$testimonials_key]['image'];
                            // dd($image_path);
                            if (File::exists($image_path)) {
                                File::delete($image_path);
                            }

                            $path = Utility::keyWiseUpload_file($request, 'image', $testimonials_img_fileName, $dir, 'testimonials', $testimonials_key, []);
                            if ($path['flag'] == 1) {
                                $url = $path['url'];
                            } else {
                                return redirect()->route('business.index', $user->id)->with('error', __($path['msg']));
                            }
                        } else {
                            if (isset($testimonials_val['get_image']) && !is_null($testimonials_val['get_image'])) {
                                $testi_details['image'] = $testimonials_val['get_image'];
                            } else {
                                $testi_details['image'] = '';
                            }
                        }
                        $testimonials_details[$testimonials_key] = $testi_details;
                        $testimonials_count++;
                    }
                    $testimonials_details = json_encode($testimonials_details);
                    // dd($testimonials_details);
                    $testimonials_data = testimonial::where('business_id', $business_id)->first();
                    if (!is_null($testimonials_data)) {
                        if ($testimonials_details != 'null') {
                            $testimonials_data->content = $testimonials_details;
                            $testimonials_data->is_enabled = '1';
                            $testimonials_data->created_by = $user->id;
                            $testimonials_data->save();
                        } else {
                            $testimonials_data->is_enabled = '1';
                            $testimonials_data->created_by = $user->id;
                            $testimonials_data->save();
                        }
                    } else {
                        testimonial::create([
                            'business_id' => $business_id,
                            'content' => $testimonials_details,
                            'is_enabled' => '1',
                            'created_by' => $user->id
                        ]);
                    }
                }
            } else {
                $testimonials_data = testimonial::where('business_id', $business_id)->first();
                if (!is_null($testimonials_data)) {
                    $testimonials_data->is_enabled = '0';
                    $testimonials_data->created_by = $user->id;
                    $testimonials_data->save();
                } else {
                    testimonial::create([
                        'business_id' => $business_id,
                        'is_enabled' => '0',
                        'created_by' => $user->id
                    ]);
                }
            }
            if ($request->is_socials_enabled == "on") {
                $sociallinks_content = json_encode($request->socials);
                $sociallinks = social::where('business_id', $business_id)->first();
                // dd($sociallinks);
                if (!is_null($sociallinks)) {
                    if ($sociallinks_content != 'null') {
                        $sociallinks->content = $sociallinks_content;
                        $sociallinks->is_enabled = '1';
                        $sociallinks->created_by = $user->id;
                        $sociallinks->save();
                    } else {

                        $sociallinks->is_enabled = '1';
                        $sociallinks->created_by = $user->id;
                        $sociallinks->save();
                    }
                } else {
                    if ($sociallinks_content != 'null') {
                        social::create([
                            'business_id' => $business_id,
                            'content' => $sociallinks_content,
                            'is_enabled' => '1',
                            'created_by' => $user->id
                        ]);
                    }
                }
            } else {
                $sociallinks = social::where('business_id', $business_id)->first();
                if (!is_null($sociallinks)) {
                    $sociallinks->is_enabled = '0';
                    $sociallinks->created_by = $user->id;
                    $sociallinks->save();
                } else {

                    social::create([
                        'business_id' => $business_id,
                        'is_enabled' => '0',
                        'created_by' => $user->id
                    ]);
                }
            }


            if ($request->is_contacts_enabled == "on") {
                $contacts_content = json_encode($request->contact);
                $contactsinfo = ContactInfo::where('business_id', $business_id)->first();
                if (!is_null($contactsinfo)) {
                    if ($contacts_content != 'null') {
                        $contactsinfo->content = $contacts_content;
                        $contactsinfo->is_enabled = '1';
                        $contactsinfo->created_by = $user->id;
                        $contactsinfo->save();
                    } else {
                        $contactsinfo->is_enabled = '1';
                        $contactsinfo->created_by = $user->id;
                        $contactsinfo->save();
                    }
                } else {
                    ContactInfo::create([
                        'business_id' => $business_id,
                        'content' => $contacts_content,
                        'is_enabled' => '1',
                        'created_by' => $user->id
                    ]);
                }
            } else {
                $contactsinfo = ContactInfo::where('business_id', $business_id)->first();
                if (!is_null($contactsinfo)) {
                    $contactsinfo->is_enabled = '0';
                    $contactsinfo->created_by = $user->id;
                    $contactsinfo->save();
                } else {
                    ContactInfo::create([
                        'business_id' => $business_id,
                        'is_enabled' => '0',
                        'created_by' => $user->id
                    ]);
                }
            }

            if ($request->is_custom_html_enabled == "on") {
                $custom_html = str_replace(array("\r\n"), "", $request->custom_html_text);
                $custom_html_text = Business::where('id', $business_id)->first();
                if (!is_null($custom_html_text)) {

                    $custom_html_text->custom_html_text = $custom_html;
                    $custom_html_text->is_custom_html_enabled = '1';
                    $custom_html_text->created_by = $user->id;
                    $custom_html_text->save();
                } else {
                    Business::create([
                        'id' => $business_id,
                        'customhtml' => $custom_html,
                        'is_enabled' => '1',
                        'created_by' => $user->id
                    ]);
                }
            } else {
                $custom_html = str_replace(array("\r\n"), "", $request->custom_html_text);
                $custom_html_text = Business::where('id', $business_id)->first();
                if (!is_null($custom_html_text)) {

                    $custom_html_text->custom_html_text = $custom_html;
                    $custom_html_text->is_custom_html_enabled = '0';
                    $custom_html_text->created_by = $user->id;
                    $custom_html_text->save();
                } else {
                    Business::create([
                        'id' => $business_id,
                        'customhtml' => $custom_html,
                        'is_enabled' => '0',
                        'created_by' => $user->id
                    ]);
                }
            }


            $business->designation = $request->designation;
            $business->created_by = $user->id;
            $business->save();
            
            
            Session::flash('fromTab', 'details-setting'); 
            
            
            return redirect()->back()->with('success', __('Business Information Add Successfully'));
        } else {

            return redirect()->back()->with('Error', __('Business does not exist'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $count = Business::where('id', $id)->where('created_by', \Auth::user()->id)->count();
        if ($count == 0) {
            return redirect()->route('business.index')->with('error', __('This card number is not yours.'));
        }
        $business = Business::where('id', $id)->delete();

        return redirect()->back()->with('success', __('Business Information Deleted Successfully'));
    }

    public function addField(Request $request) {
        return $request->all();
    }

    public function getcard($slug) {

        
//        var_dump('Ninad');
        
        if (!\Auth::check()) {
            $visit = visitor()->visit($slug);
            $visit_data = \DB::table('visitor')->where('slug', $visit->slug)->get();
            foreach ($visit_data as $key => $value) {
                $busi_data = Business::where('slug', $value->slug)->first();
                if (!is_null($busi_data)) {
                    $v_data = \DB::table('visitor')->where('id', $value->id)->update(['created_by' => $busi_data->created_by]);
                }
            }
        }
        $business = Business::where('slug', $slug)->first();
        // $user=User::find($business->created_by);
        // $plan=Plan::find($user->plan);
        // dd($business->created_by);
        if (!is_null($business)) {
            \App::setLocale($business->getLanguage());
            $is_slug = "true";

            $businessfields = Utility::getFields();
            $businesshours = business_hours::where('business_id', $business->id)->first();
            $appoinment = appoinment::where('business_id', $business->id)->first();
            $appoinment_hours = [];
            if (!empty($appoinment->content)) {
                $appoinment_hours = json_decode($appoinment->content);
            }

            $services = service::where('business_id', $business->id)->first();
            $services_content = [];
            if (!empty($services->content)) {
                $services_content = json_decode($services->content);
            }

            $testimonials = testimonial::where('business_id', $business->id)->first();
            $testimonials_content = [];
            if (!empty($testimonials->content)) {
                $testimonials_content = json_decode($testimonials->content);
            }

            $contactinfo = ContactInfo::where('business_id', $business->id)->first();
            $contactinfo_content = [];
            if (!empty($contactinfo->content)) {
                $contactinfo_content = json_decode($contactinfo->content);
            }

            $sociallinks = social::where('business_id', $business->id)->first();
            $social_content = [];
            if (!empty($sociallinks->content)) {
                $social_content = json_decode($sociallinks->content);
            }

            $customhtml = Business::where('id', $business->id)->first();
            $user = User::find($business->created_by);
            $plan = Plan::find($user->plan);
            $days = business_hours::$days;
            $business_hours = '';
            if (!empty($businesshours->content)) {
                $business_hours = json_decode($businesshours->content);
            }
            if (json_decode($business->card_theme) == NULL) {
                $card_order = [];
                $card_order['theme'] = $business->card_theme;
                $card_order['order'] = Utility::getDefaultThemeOrder($business->card_theme);
                $business->card_theme = json_encode($card_order);
                $business->save();
            }
            $card_theme = json_decode($business->card_theme);
            // dd($plan);
            return view('card.' . $card_theme->theme . '.index', compact('businessfields', 'contactinfo', 'contactinfo_content', 'appoinment_hours', 'appoinment', 'services_content', 'services', 'testimonials_content', 'testimonials', 'social_content', 'sociallinks', 'customhtml', 'businesshours', 'business_hours', 'business', 'days', 'is_slug', 'plan'));
        } else {
            return abort('403', 'The Link You Followed Has Expired');
        }
    }

    /* public function gettemplate($id){
      $business = Business::where('id',$id)->first();
      $businessfields = Utility::getFields();
      $businesshours = business_hours::where('business_id',$id)->first();
      $appoinment = appoinment::where('business_id',$id)->first();
      $appoinment_hours = [];
      if(!empty($appoinment->content))
      {
      $appoinment_hours = json_decode($appoinment->content);
      }

      $services = service::where('business_id',$id)->first();
      $services_content = [];
      if(!empty($services->content))
      {
      $services_content = json_decode($services->content);
      }

      $contactinfo = ContactInfo::where('business_id',$id)->first();
      $contactinfo_content = [];
      if(!empty($contactinfo->content))
      {
      $contactinfo_content = json_decode($contactinfo->content);
      }

      $testimonials = testimonial::where('business_id',$id)->first();
      $testimonials_content = [];
      if(!empty($testimonials->content))
      {
      $testimonials_content = json_decode($testimonials->content);
      }

      $sociallinks = social::where('business_id',$id)->first();
      $social_content = [];
      if(!empty($sociallinks->content))
      {
      $social_content = json_decode($sociallinks->content);
      }


      $days = business_hours::$days;
      $business_hours = [];
      if(!empty($businesshours->content))
      {
      $business_hours = json_decode($businesshours->content);
      }
      return view('card.index',compact('businessfields','contactinfo','contactinfo_content','appoinment_hours','appoinment','services_content','services','testimonials_content','testimonials','social_content','sociallinks','businesshours','business_hours','business','days','id'));
      } */

    public function editTheme($id, Request $request) {
        
        
        if(Auth::user()->type == 'super admin'){
            
           

        }else{

            $count = Business::where('id', $id)->where('created_by', \Auth::user()->id)->count();
            if ($count == 0) {
                return redirect()->route('business.index')->with('error', __('This card number is not yours.'));
            }

        }
        
        
        
        
        
        //return $request->all();
        $validator = \Validator::make(
                        $request->all(), [
                    'theme_color' => 'required',
                    'themefile' => 'required',
                        ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }
        $card_order = [];
        $card_order['theme'] = $request->themefile;
        $card_order['order'] = Utility::getDefaultThemeOrder($request->themefile);
        $businesss = Business::where('id', $id)->first();
        $businesss['theme_color'] = $request->theme_color;
        $businesss['card_theme'] = json_encode($card_order);
        $businesss->save();

        Session::flash('fromTab', 'theme-setting'); 
        
        return redirect()->back()->with('success', __('Theme Successfully Updated.'));
    }

    public function getVcardDownload($slug) {
        $business = Business::where('slug', $slug)->first();

        $vcard = new VCard();

        $lastname = '';
        $firstname = $business->title;
        $additional = '';
        $prefix = '';
        $suffix = '';
        // add personal data
        $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

        // add work data
        $vcard->addCompany($business->title);
        $vcard->addRole($business->designation);
        $logo = isset($business->logo) && !empty($business->logo) ? asset(Storage::url('card_logo/' . $business->logo)) : asset('custom/img/logo-placeholder-image-2.png');
        $vcard->addPhoto($logo);
        $contacts = ContactInfo::where('business_id', $business->id)->first();
        // dd($vcard);
        if (!empty($contacts) && !empty($contacts->content)) {
            if (isset($contacts['is_enabled']) && $contacts['is_enabled'] == '1') {
                $contact = json_decode($contacts->content, true);
                foreach ($contact as $key => $val) {
                    foreach ($val as $key2 => $val2) {
                        if ($key2 == 'Email') {
                            $vcard->addEmail($val2);
                        }
                        if ($key2 == 'Phone') {
                            $vcard->addPhoneNumber($val2, 'TYPE#WORK,VOICE');
                        }
                        if ($key2 == 'Whatsapp') {
                            $vcard->addPhoneNumber($val2, 'WORK');
                        }
                        if ($key2 == 'Web_url') {
                            $vcard->addURL($val2);
                        }
                    }
                }
            }
        }
        $sociallinks = social::where('business_id', $business->id)->first();
        $social_content = [];
        if (!empty($sociallinks->content)) {
            $social_content = json_decode($sociallinks->content);
        }
        if (!is_null($social_content) && !is_null($sociallinks)) {
            if (isset($sociallinks['is_enabled']) && $sociallinks['is_enabled'] == '1') {
                foreach ($social_content as $social_key => $social_val) {
                    foreach ($social_val as $social_key1 => $social_val1) {
                        if ($social_key1 != 'id') {
                            $vcard->addURL($social_val1, 'TYPE=' . $social_key1);
                        }
                    }
                }
            }
        }
        // $sociallinks = social::where('business_id',$business->id)->first();


        $path = public_path('/card');
        \File::delete($path);
        if (!is_dir($path)) {
            \File::makeDirectory($path, 0777);
        }
        $vcard->setSavePath($path);
//dd($vcard);
        $vcard->save();
        $file = $vcard->getFilename() . '.' . $vcard->getFileExtension();
        self::download($path . '/' . $file);

        // return vcard as a download
        // return $vcard->download();
    }

    function download($file) {


        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            flush();
            readfile($file);
            exit;
        }
    }

    public function analytics($id) {

        
        if(Auth::user()->type == 'super admin'){
            
//            $user = User::where('id', $business->created_by)->first(); 

        }else{

            $count = Business::where('id', $id)->where('created_by', \Auth::user()->id)->count();
            if ($count == 0) {
                return redirect()->route('business.index')->with('error', __('This card number is not yours.'));
            }

        }
        
        
        
        
        
        $business = Business::find($id);

        $chartData = $this->getOrderChart(['duration' => 'week'], $id);

        $user_device = \DB::table('visitor')->where('slug', $business->slug)->selectRaw("count('*') as total, device")->groupBy('device')->orderBy('device', 'DESC')->get();
        $user_browser = \DB::table('visitor')->where('slug', $business->slug)->selectRaw("count('*') as total, browser")->groupBy('browser')->orderBy('browser', 'DESC')->get();
        $user_platform = \DB::table('visitor')->where('slug', $business->slug)->selectRaw("count('*') as total, platform")->groupBy('platform')->orderBy('platform', 'DESC')->get();

        $devicearray = [];
        $devicearray['label'] = [];
        $devicearray['data'] = [];

        foreach ($user_device as $name => $device) {
            if (!empty($device->device)) {
                $devicearray['label'][] = $device->device;
            } else {
                $devicearray['label'][] = 'Other';
            }
            $devicearray['data'][] = $device->total;
        }

        $browserarray = [];
        $browserarray['label'] = [];
        $browserarray['data'] = [];

        foreach ($user_browser as $name => $browser) {
            $browserarray['label'][] = $browser->browser;
            $browserarray['data'][] = $browser->total;
        }
        $platformarray = [];
        $platformarray['label'] = [];
        $platformarray['data'] = [];

        foreach ($user_platform as $name => $platform) {
            $platformarray['label'][] = $platform->platform;
            $platformarray['data'][] = $platform->total;
        }
        return view('business.analytics', compact('platformarray', 'chartData', 'browserarray', 'devicearray'));
    }

    public function getOrderChart($arrParam, $id) {
        $user = \Auth::user();

        $arrDuration = [];
        if ($arrParam['duration']) {
            if ($arrParam['duration'] == 'week') {
                $previous_month = strtotime("-15 days");
                for ($i = 0; $i < 15; $i++) {
                    $arrDuration[date('Y-m-d', $previous_month)] = date('d-M', $previous_month);
                    $previous_month = strtotime(date('Y-m-d', $previous_month) . " +1 day");
                }
            }
        }
        $arrTask = [];
        $arrTask['label'] = [];
        $arrTask['data'] = [];

        foreach ($arrDuration as $date => $label) {
            $data['visitor'] = \DB::table('visitor')->select(\DB::raw('count(*) as total'))->whereDate('created_at', '=', $date)->where('created_by', \Auth::user()->creatorId())->first();
            $uniq = \DB::table('visitor')->select('ip')->distinct()->whereDate('created_at', '=', $date)->where('created_by', \Auth::user()->creatorId())->get();

            $data['unique'] = $uniq->count();
            $arrTask['label'][] = $label;
            $arrTask['data'][] = $data['visitor']->total;
            $arrTask['unique_data'][] = $data['unique'];
        }

        $business = Business::where('id', $id)->first();
        if ($business != NULL) {
            $array_app = [];
            $d['data'] = [];
            $d['name'] = $business->title;
            foreach ($arrDuration as $date => $label) {
                $d['data'][] = \DB::table('appointment_deatails')->where('business_id', $business->id)->where('created_by', \Auth::user()->creatorId())->whereDate('created_at', '=', $date)->count();
            }
            $array_app[] = $d;
            $arrTask['data'] = $array_app;
            return $arrTask;
        } else {
            return abort('404', 'Not Found');
        }
    }

    public function domainsetting($id, Request $request) {
        //return $request->all();
        
        
        if(Auth::user()->type == 'super admin'){
            
            

        }else{

            $count = Business::where('id', $id)->where('created_by', \Auth::user()->id)->count();
            if ($count == 0) {
                return redirect()->route('business.index')->with('error', __('This card number is not yours.'));
            }

        }
        
        
        
        
        $business = Business::where('id', $id)->first();
        if ($request->enable_domain == 'enable_domain') {
            // Remove the http://, www., and slash(/) from the URL
            $input = $request->domains;
            // If URI is like, eg. www.way2tutorial.com/
            $input = trim($input, '/');
            // If not have http:// or https:// then prepend it
            if (!preg_match('#^http(s)?://#', $input)) {
                $input = 'http://' . $input;
            }

            $urlParts = parse_url($input);
            // Remove www.
            $domain_name = preg_replace('/^www\./', '', $urlParts['host']);
            // Output way2tutorial.com
        }
        if ($request->enable_domain == 'enable_subdomain') {
            // Remove the http://, www., and slash(/) from the URL
            $input = env('APP_URL');

            // If URI is like, eg. www.way2tutorial.com/
            $input = trim($input, '/');
            // If not have http:// or https:// then prepend it
            if (!preg_match('#^http(s)?://#', $input)) {
                $input = 'http://' . $input;
            }

            $urlParts = parse_url($input);

            // Remove www.
            $subdomain_name = preg_replace('/^www\./', '', $urlParts['host']);
            // Output way2tutorial.com
            $subdomain_name = $request->subdomain . '.' . $subdomain_name;
        }

        if ($request->enable_domain == 'enable_domain') {
            $business['domains'] = $domain_name;
        }

        $business['enable_businesslink'] = ($request->enable_domain == 'enable_businesslink' || empty($request->enable_domain)) ? 'on' : 'off';
        $business['enable_domain'] = ($request->enable_domain == 'enable_domain') ? 'on' : 'off';
        $business['enable_subdomain'] = ($request->enable_domain == 'enable_subdomain') ? 'on' : 'off';

        if ($request->enable_domain == 'enable_subdomain') {
            $business['subdomain'] = $subdomain_name;
        }
        $business->save();
        
         Session::flash('fromTab', 'domain-setting');
        
        return redirect()->back()->with('success', __('Domain Setting Successfully Updated.'));
    }

    public function cardpdf($slug) {

        $business = Business::where('slug', $slug)->first();
        $user = User::find($business->created_by);
        $plan = Plan::find($user->plan);
        if (!is_null($business)) {
            \App::setLocale($business->getLanguage());
            $is_slug = "true";
            $is_pdf = "true";
            $businessfields = Utility::getFields();
            $businesshours = business_hours::where('business_id', $business->id)->first();
            $appoinment = appoinment::where('business_id', $business->id)->first();
            $appoinment_hours = [];
            if (!empty($appoinment->content)) {
                $appoinment_hours = json_decode($appoinment->content);
            }

            $services = service::where('business_id', $business->id)->first();
            $services_content = [];
            if (!empty($services->content)) {
                $services_content = json_decode($services->content);
            }

            $testimonials = testimonial::where('business_id', $business->id)->first();
            $testimonials_content = [];
            if (!empty($testimonials->content)) {
                $testimonials_content = json_decode($testimonials->content);
            }

            $contactinfo = ContactInfo::where('business_id', $business->id)->first();
            $contactinfo_content = [];
            if (!empty($contactinfo->content)) {
                $contactinfo_content = json_decode($contactinfo->content);
            }

            $sociallinks = social::where('business_id', $business->id)->first();
            $social_content = [];
            if (!empty($sociallinks->content)) {
                $social_content = json_decode($sociallinks->content);
            }

            $customhtml = Business::where('id', $business->id)->first();
            $plan = Plan::where('id', $user->plan)->first();

            $days = business_hours::$days;
            $business_hours = '';
            if (!empty($businesshours->content)) {
                $business_hours = json_decode($businesshours->content);
            }
            if (json_decode($business->card_theme) == NULL) {
                $card_order = [];
                $card_order['theme'] = $business->card_theme;
                $card_order['order'] = Utility::getDefaultThemeOrder($business->card_theme);
                $business->card_theme = json_encode($card_order);
                $business->save();
            }
            $card_theme = json_decode($business->card_theme);
            return view('card.' . $card_theme->theme . '.index', compact('businessfields', 'contactinfo', 'contactinfo_content', 'appoinment_hours', 'appoinment', 'services_content', 'services', 'testimonials_content', 'testimonials', 'social_content', 'sociallinks', 'customhtml', 'businesshours', 'business_hours', 'business', 'days', 'is_slug', 'is_pdf', 'plan'));
        } else {
            return abort('403', 'The Link You Followed Has Expired');
        }
    }

    public function downloadqr(Request $request) {
        //    dd($request->all());
        $logo = asset(Storage::url('uploads/logo/'));
        $company_logo = Utility::getValByName('company_logo');
        $img = asset($logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png'));

        $qrData = $request->qrData;
        $business = Business::where('slug', $qrData)->first();
        $view = view('business.businessQR', compact('qrData', 'business'))->render();

        $data['success'] = true;
        $data['data'] = $view;
        return $data;
    }

    public function blocksetting($id, Request $request) {
        //return $request->all();
        
        if(Auth::user()->type == 'super admin'){
            
            

        }else{

            $count = Business::where('id', $id)->where('created_by', \Auth::user()->id)->count();
            if ($count == 0) {
                return redirect()->route('business.index')->with('error', __('This card number is not yours.'));
            }

        }
        
        
        
        $business = Business::where('id', $id)->first();
        $card_order = [];
        $order = [];
        $card_order['theme'] = $request->theme_name;
        $req_order = explode(",", $request->order);
        foreach ($req_order as $key => $value) {
            $od = $key + 1;
            $order[$value] = $od;
        }
        $card_order['order'] = $order;
        $business->card_theme = $card_order;
        $business->save();

        $contact_data = ContactInfo::where('business_id', $id)->first();
        if ($contact_data != NULL) {
            $contact_data['is_enabled'] = $request->is_contact_info_enabled == 'on' ? '1' : '0';
            $contact_data->save();
        } else {
            ContactInfo::create([
                'business_id' => $id,
                'is_enabled' => $request->is_contact_info_enabled == 'on' ? '1' : '0',
                'created_by' => \Auth::user()->id
            ]);
        }

        $bussiness_hour_data = business_hours::where('business_id', $id)->first();
        if ($bussiness_hour_data != NULL) {
            $bussiness_hour_data['is_enabled'] = $request->is_bussiness_hour_enabled == 'on' ? '1' : '0';
            $bussiness_hour_data->save();
        } else {
            business_hours::create([
                'business_id' => $id,
                'is_enabled' => $request->is_bussiness_hour_enabled == 'on' ? '1' : '0',
                'created_by' => \Auth::user()->id
            ]);
        }

        $appointment_data = appoinment::where('business_id', $id)->first();
        if ($appointment_data != NULL) {
            $appointment_data['is_enabled'] = $request->is_appointment_enabled == 'on' ? '1' : '0';
            $appointment_data->save();
        } else {
            appoinment::create([
                'business_id' => $id,
                'is_enabled' => $request->is_appointment_enabled == 'on' ? '1' : '0',
                'created_by' => \Auth::user()->id
            ]);
        }

        $service_data = service::where('business_id', $id)->first();
        if ($service_data != NULL) {
            $service_data['is_enabled'] = $request->is_service_enabled == 'on' ? '1' : '0';
            $service_data->save();
        } else {
            service::create([
                'business_id' => $id,
                'is_enabled' => $request->is_service_enabled == 'on' ? '1' : '0',
                'created_by' => \Auth::user()->id
            ]);
        }

        $testimonials_data = testimonial::where('business_id', $id)->first();
        if ($testimonials_data != NULL) {
            $testimonials_data['is_enabled'] = $request->is_testimonials_enabled == 'on' ? '1' : '0';
            $testimonials_data->save();
        } else {
            testimonial::create([
                'business_id' => $id,
                'is_enabled' => $request->is_testimonials_enabled == 'on' ? '1' : '0',
                'created_by' => \Auth::user()->id
            ]);
        }

        $social_data = social::where('business_id', $id)->first();
        if ($social_data != NULL) {
            $social_data['is_enabled'] = $request->is_social_enabled == 'on' ? '1' : '0';
            $social_data->save();
        } else {
            social::create([
                'business_id' => $id,
                'is_enabled' => $request->is_social_enabled == 'on' ? '1' : '0',
                'created_by' => \Auth::user()->id
            ]);
        }

        $custom_html = Business::where('id', $id)->first();
        if ($custom_html != NULL) {
            $custom_html['is_custom_html_enabled'] = $request->is_custom_html_enabled == 'on' ? '1' : '0';
            $custom_html->save();
        } else {
            Business::create([
                'business_id' => $id,
                'is_enabled' => $request->is_custom_html_enabled == 'on' ? '1' : '0',
                'created_by' => \Auth::user()->id
            ]);
        }

        $branding = Business::where('id', $id)->first();
        if ($branding != NULL) {
            $branding['is_branding_enabled'] = $request->is_branding_enabled == 'on' ? '1' : '0';
            $branding->save();
        } else {
            Business::create([
                'business_id' => $id,
                'is_enabled' => $request->is_branding_enabled == 'on' ? '1' : '0',
                'created_by' => \Auth::user()->id
            ]);
        }
         Session::flash('fromTab', 'block-setting');
        return redirect()->back()->with('success', __('Block Order Successfully Updated.'));
    }

    public function savejsandcss(Request $request, $id) {
        $business = Business::find($id);
        $business->customjs = $request->customjs;
        $business->customcss = $request->customcss;
        $business->save();

        return redirect()->back()->with('success', __('Custom JS and CSS Successfully Updated.'));
    }

    public function saveseo(Request $request, $id) {
        $business = Business::find($id);
        $business->meta_keyword = $request->meta_keyword;
        $business->meta_description = $request->meta_description;
        $business->google_analytic = $request->google_analytic;
        $business->fbpixel_code = $request->fbpixel_code;
        $business->save();
        Session::flash('fromTab', 'seo-setting');
        return redirect()->back()->with('success', __('SEO Successfully Updated.'));
    }

    public function savegooglefont(Request $request, $id) {
        $business = Business::find($id);
        $business->google_fonts = $request->google_fonts;
        $business->save();

        return redirect()->back()->with('success', __('Google Font Successfully Updated.'));
    }

    public function savepassword(Request $request, $id) {
        $request->validate([
            'password' => Rules\Password::defaults(),
        ]);
        $business = Business::find($id);
        $business->password = $request->password;
        $business->enable_password = $request->is_password_enabled;
        $business->save();

        return redirect()->back()->with('success', __('Password Successfully Updated.'));
    }

    public function savegdpr(Request $request, $id) {
        // $request->validate([
        //     'password' => Rules\Password::defaults(),
        // ]);
        // if(!isset($request->gdpr_cookie))
        // {
        //     $post['gdpr_cookie'] = 'off';
        // }

        $business = Business::find($id);
        $business->is_gdpr_enabled = $request->gdpr_cookie;
        $business->gdpr_text = $request->cookie_text;
        $business->save();

        return redirect()->back()->with('success', __('GDPR Cookie Successfully Updated.'));
    }

    public function savebranding(Request $request, $id) {
        //  dd($request->all());
        $business = Business::find($id);
        $business->is_branding_enabled = $request->branding;
        $business->branding_text = $request->branding_text;
        $business->save();
        return redirect()->back()->with('success', __('Branding Successfully Updated.'));
    }

}
