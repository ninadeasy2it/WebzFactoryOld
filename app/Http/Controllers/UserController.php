<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;
use App\Models\PlanOrder;
use App\Mail\UserCreate;
use Illuminate\Support\Facades\Hash;
use Auth;
use File;
use App\Models\Utility;

class UserController extends Controller
{
    public function index()
    { 
        $user = \Auth::user();
        $users = User::where('created_by', '=', $user->creatorId())->where('type', '=', 'company')->get();
        return view('user.index')->with('users', $users);
    }


    public function create()
    {
        $user  = \Auth::user();
        return view('user.create');
    }

    public function store(Request $request)
    {

        $default_language = \DB::table('settings')->select('value')->where('name', 'default_language')->first();
        $validator = \Validator::make(
            $request->all(), [
                'name' => 'required|max:120',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]
        );
        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $user               = new User();
        $user['name']       = $request->name;
        $user['email']      = $request->email;
        $psw                = $request->password;
        $user['password']   = \Hash::make($request->password);
        $user['type']       = 'company';
        $user['lang']       = !empty($default_language) ? $default_language->value : '';
        $user['created_by'] = \Auth::user()->creatorId();
        $user['plan']       = Plan::first()->id;
        $user->save();
        $user->password = $psw;

        $userArr=[
            'user_name' => $user->name,
            'user_email' => $user->email,
            'user_password' => $request->password,
            'user_type' => $user->type,
            'created_by' => $user->created_by,
        ];

        try
        {
            $resp = \Utility::sendEmailTemplate('User Created',$userArr,$user->email);

            // \Mail::to($user->email)->send(new UserCreate($user));
        }
        catch(\Exception $e)
        {

            $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
        }
        return redirect()->route('users.index')->with('success', __('User successfully added.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : '')); 

    }

    public function edit($id)
    {
        $user  = \Auth::user();
        $user              = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validator = \Validator::make(
            $request->all(), [
                                'name' => 'required|max:120',
                                'email' => 'required|email|unique:users,email,' . $id,
                            ]
        );
        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $input = $request->all();
        $user->fill($input)->save();
        

        return redirect()->route('users.index')->with(
            'success', 'User successfully updated.'
        );

    }
    public function upgradePlan($user_id)
    {
        $user = User::find($user_id);

        $plans = Plan::get();

        return view('user.plan', compact('user', 'plans'));
    }


    public function destroy($id)
    {
       
            $user = User::find($id);
            if($user)
            {
                    $user->delete();

                return redirect()->route('users.index')->with('success', __('User successfully deleted .'));
            }
            else
            {
                return redirect()->back()->with('error', __('Something is wrong.'));
            }
       
    }

    public function profile()
    {
        $userDetail              = \Auth::user();
        return view('user.profile', compact('userDetail'));
    }

    public function editprofile(Request $request)
    {
        $userDetail = \Auth::user();
        $user       = User::findOrFail($userDetail['id']);
        $this->validate(
            $request, [
                        'name' => 'required|max:120',
                        'email' => 'required|email|unique:users,email,' . $userDetail['id'],
                    ]
        );
        if($request->hasFile('profile'))
        {
            $filenameWithExt = $request->file('profile')->getClientOriginalName();
            $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension       = $request->file('profile')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $settings = Utility::getStorageSetting();

            if($settings['storage_setting']=='local'){
                $dir        = 'uploads/avatar/';
            }
            else{
                    $dir        = 'uploads/avatar';
            }
            
            $image_path = $dir . $userDetail['avatar'];
            if(File::exists($image_path))
            {
                File::delete($image_path);
            }

            $path = Utility::upload_file($request,'profile',$fileNameToStore,$dir,[]);
            
            if($path['flag'] == 1){
                $url = $path['url'];
            }else{
                return redirect()->route('profile', \Auth::user()->id)->with('error', __($path['msg']));
            }

        }

        if(!empty($request->profile))
        {
            $user['avatar'] = $fileNameToStore;
        }
        $user['name']  = $request['name'];
        $user['email'] = $request['email'];
        $user->save();
     

        return redirect()->back()->with(
            'success', 'Profile successfully updated.'
        );
    }

     public function updatePassword(Request $request)
    {

        if(Auth::Check())
        {
            $request->validate(
                [
                    'current_password' => 'required',
                    'new_password' => 'required|same:new_password',
                    'confirm_password' => 'required|same:new_password',
                ]
            );
            $objUser          = Auth::user();
            $request_data     = $request->All();
            $current_password = $objUser->password;

            if(Hash::check($request_data['current_password'], $current_password))
            {
                $user_id            = Auth::User()->id;
                $obj_user           = User::find($user_id);
                $obj_user->password = Hash::make($request_data['new_password']);;
                $obj_user->save();

                return redirect()->route('profile')->with('success', __('Password Updated Successfully!'));
            }
            else
            {
                return redirect()->route('profile')->with('error', __('Please Enter Correct Current Password!'));
            }
        }
        else
        {
            return redirect()->route('profile')->with('error', __('Something is wrong!'));
        }
    }

    public function changeLanquage($lang)
    {

        $user       = Auth::user();
        $user->lang = $lang;
        $user->save();

        return redirect()->back()->with('success', __('Language Change Successfully!'));


    }
    public function activePlan($user_id, $plan_id)
    {

        $user       = User::find($user_id);
        $assignPlan = $user->assignPlan($plan_id);
        $plan       = Plan::find($plan_id);
        if($assignPlan['is_success'] == true && !empty($plan))
        {
            $orderID = strtoupper(str_replace('.', '', uniqid('', true)));
            PlanOrder::create(
                [
                    'order_id' => $orderID,
                    'name' => null,
                    'card_number' => null,
                    'card_exp_month' => null,
                    'card_exp_year' => null,
                    'plan_name' => $plan->name,
                    'plan_id' => $plan->id,
                    'price' => $plan->price,
                    'price_currency' => isset(\Auth::user()->planPrice()['currency']) ? \Auth::user()->planPrice()['currency'] : '',
                    'txn_id' => '',
                    'payment_status' => 'succeeded',
                    'receipt' => null,
                    'user_id' => $user->id,
                ]
            );

            return redirect()->back()->with('success', 'Plan successfully upgraded.');
        }
        else
        {
            return redirect()->back()->with('error', 'Plan fail to upgrade.');
        }

    }
    public function userPassword($id)
    {

        $eId        = \Crypt::decrypt($id);
        $user = User::where('id',$eId)->first();
        return view('user.reset', compact('user'));
    }
    public function userPasswordReset(Request $request, $id){
        $validator = \Validator::make(
            $request->all(), [
                               'password' => 'required|confirmed|same:password_confirmation',
                           ]
        );
        if($validator->fails())
        {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }
        $user                 = User::where('id', $id)->first();
        $user->forceFill([
            'password' => Hash::make($request->password),
        ])->save();
        return redirect()->route('users.index')->with(
                     'success', 'User Password successfully updated.'
                 );
    }

}
