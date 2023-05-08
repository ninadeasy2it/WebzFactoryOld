<?php

namespace App\Http\Controllers;

use App\Models\Appointment_deatail;
use App\Models\Business;
use App\Models\User;
use App\Mail\AppointmentCreate;
use Mail;
use Illuminate\Http\Request;
use App\Models\Utility;

class AppointmentDeatailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       $appointment_deatails = Appointment_deatail::where('created_by',\Auth::user()->creatorId())->orderBy('date','DESC')->get();
       foreach ($appointment_deatails as $key => $value) {
           $business_name = Business::where('id',$value->business_id)->pluck('title')->first();
           $value->business_name = $business_name;
        }
        // dd($appointment_deatails);

       return view('appointments.index',compact('appointment_deatails'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $business_id = $request->business_id;
        $business = Business::where('id',$business_id)->first();
        $user = User::where('id',$business->created_by)->first();
        $appointment = Appointment_deatail::create([
            'business_id' => $request->business_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date' => $request->date,
            'time' => $request->time,
            'created_by' => $business->created_by
        ]); 
        $email = Utility::getValByName('company_email');
        if(!isset($email) || empty($email) || $email == null || $email == ""){
            $email = $user->email;
        }
        $settings = [];
        $settings['from_name'] = $appointment->name;
        $settings['from_email'] = $appointment->email;
        try
        {
            $appArr = [
                'appointment_name' => $request->name,
                'appointment_email' => $request->email,
                'appointment_phone' => $request->phone,
                'appointment_date' => $request->date,
                'appointment_time' => $request->time,
                'created_by' => $business->created_by,
            ];

            $resp = Utility::sendEmailTemplate('Appointment Created',$appArr,$appointment->email);
            // Mail::to($email)->send(new AppointmentCreate($appointment,$settings));
        }
        catch(\Exception $e)
        {
            
            $error = __('E-Mail has been not sent due to SMTP configuration');
        }     
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment_deatail  $appointment_deatail
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment_deatail $appointment_deatail)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment_deatail  $appointment_deatail
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment_deatail $appointment_deatail)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment_deatail  $appointment_deatail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment_deatail $appointment_deatail)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment_deatail  $appointment_deatail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment_deatail $appointment_deatail,$id)
    {
        $app = Appointment_deatail::find($id);
        if($app){
            $app->delete();
            return redirect()->back()->with('success', __('Appointment successfully deleted.'));
        }
        return redirect()->back()->with('error', __('Appointment not found.'));
    }

    public function getCalenderAllData($id=null){   
        $objUser          = \Auth::user();
        if($id== null){
            $appointents = Appointment_deatail::where('created_by',\Auth::user()->id)->get();
        }else{
            $appointents = Appointment_deatail::where('business_id',$id)->where('created_by',\Auth::user()->id)->get();
        }
        $arrayJson = [];
        foreach($appointents as $appointent)
        {
            $time = explode('-',$appointent->time);
            $stime = isset($time[0])?trim($time[0]).':00':'00:00:00';
            $etime = isset($time[1])?trim($time[1]).':00':'00:00:00';
            $start_date = date("Y-m-d",strtotime($appointent->date)).' '.$stime;
            $end_date = date("Y-m-d",strtotime($appointent->date)).' '.$etime;
           
            $arrayJson[] = [
                "title" =>'('.$stime .' - '. $etime.') '.$appointent->name .'-'. $appointent->getBussinessName(),
                "start" => $start_date,
                "end" => $end_date ,
                "app_id" => $appointent->id,
                "url" => route('appointment.details',$appointent->id),
                "className" =>  'event-info',
                "allDay" => true,
            ];
        }
        return view('appointments.calender',compact('arrayJson'));
    }

    public function getAppointmentDetails($id){ 
        $ad = Appointment_deatail::find($id);
        return view('appointments.calender-modal',compact('ad'));
    }

    public function add_note($id){
        $appointment = Appointment_deatail::where('id',$id)->first();
        return view('appointments.add_note',compact('appointment'));
    }

    public function note_store($id,Request $request){ 
        //return $request->all();
        $appointment = Appointment_deatail::where('id',$id)->first();
        $appointment->status = $request->status;
        $appointment->note = $request->note;
        $appointment->save();
        return redirect()->back()->with('success', __('Note added successfully.'));
    }

}

