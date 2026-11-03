<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\feedback;
use App\Models\Doctors;
use App\Models\department;
use App\Models\press_desk;
use App\Models\appointment;
use Illuminate\Support\Facades\DB;
use App\Notifications\NewAppointmentNotification;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class Homecontroller extends Controller
{
    public function appointmentform_validates(Request $req){

        if (!Auth::check()) {
            return redirect()->route('user.login')->with('error', 'Please sign in to your patient account first to confirm and book your appointment.');
        }

        $maxAdvanceDate = date('Y-m-d', strtotime('+30 days'));

        $req->validate([
                'appointmentname' => 'required|regex:/^[a-zA-Z]+$/u|min:3|max:12',
                'email'=>'required|email:rfc,dns',
                'phone'=>'required|digits:10',
                'departmentname'=>'required',
                'username'=>'required',
                'date'=>'required|date|after_or_equal:today|before_or_equal:' . $maxAdvanceDate,
                'time'=>'required',
                'message'=>'required',
                'gender'=>'required',
        ],[
            'departmentname.required' => 'the department field is required',
            'appointmentname.required' => 'Your Name  is required',
            'message.required' => 'Problem facing field required',
            'username.required' => 'the doctor field is required',
            'date.after_or_equal' => 'Appointment cannot be booked for past dates.',
            'date.before_or_equal' => 'Appointments can only be booked up to 30 days in advance according to the monthly schedule.',
        ]);

        // Prevent booking slots that have already passed for today
        if ($req->date === date('Y-m-d')) {
            $timeInput = $req->time;
            $slotStartStr = trim(explode('-', $timeInput)[0]);
            try {
                $slotStart = \Carbon\Carbon::parse($req->date . ' ' . $slotStartStr, 'Asia/Kolkata');
                if (\Carbon\Carbon::now('Asia/Kolkata')->greaterThanOrEqualTo($slotStart)) {
                    return back()->withInput()->withErrors([
                        'time' => "The consultation slot '{$timeInput}' has already passed for today. Please select an upcoming slot or choose another date."
                    ]);
                }
            } catch (\Exception $e) {
                // ignore
            }
        }

        // Validate Doctor Availability (Off-Duty / Day-Off check)
        $doc = $req->input('username');
        $doctorRecord = Doctors::where('username', $doc)->first();
        if ($doctorRecord && !$doctorRecord->is_available) {
            return back()->withInput()->withErrors([
                'username' => "Dr. {$doctorRecord->username} is currently Off-Duty (Out of Office) and not accepting online appointments. Please select an available doctor."
            ]);
        }
        $calcDay = $req->input('day') ?: date('l', strtotime($req->date));
        if ($doctorRecord && $calcDay) {
            $sched = \App\Models\DoctorSchedule::where('doctor_id', $doctorRecord->id)->where('day_name', $calcDay)->first();
            if ($sched && $sched->is_day_off) {
                return back()->withInput()->withErrors([
                    'date' => "Dr. {$doctorRecord->username} has a scheduled Day Off on {$calcDay}s ({$sched->notes}). Please pick another date."
                ]);
            }
        }
        
        $appointment = new appointment();
    $appointment->appointmentname=$req->appointmentname;
    $appointment->email=$req->email;
    $appointment->phone=$req->phone;
    $appointment->gender=$req->gender;
    $appointment->departmentname=$req->departmentname;
    $appointment->username=$req->username;
    $appointment->date=$req->date;
    $day = $req->input('day');
    if (empty($day) && $req->filled('date')) {
        try {
            $day = \Carbon\Carbon::parse($req->date)->format('l');
        } catch (\Exception $e) {
            $day = null;
        }
    }
    $appointment->day = $day;
    $appointment->time=$req->time;
    $appointment->message=$req->message;
    $appointment->user_id=Auth::id();

    if ($appointment->save()) {
        $data = ['email'=>$req->email,'appointmentname'=>$req->appointmentname];
        Mail::send('emails.send_email_view_home_appointment',['data'=>$data], function($message) use($data){
            $message->to($data['email'],$data['appointmentname'])->subject('KK PATEL HOSPITAL');
            $message->from('bgorasiya881@rku.ac.in','gorasiya bhoomin');
         });
        session()->flash('success', 'Thanks for Booking An Appointment.You will be replied soon');
            
    }
    else {
        session()->flash('error', 'Appointmnet Failed');
        
   }
        return redirect('appointment');
    }
    
    public function appointment(Request $request){
        try {
            $data['departments']=DB::table('department')->orderBy('departmentname','asc')->get();
        } catch (\Throwable $e) {
            $data['departments'] = collect([
                (object)['id' => 1, 'departmentname' => 'Cardiologist', 'departmentimage' => 'img/departments/1.png'],
                (object)['id' => 2, 'departmentname' => 'oncology', 'departmentimage' => 'img/departments/2.png'],
                (object)['id' => 3, 'departmentname' => 'nephrology', 'departmentimage' => 'img/departments/3.png'],
            ]);
        }
		return view('appointment',$data);
	}
    
    
    public function getdoctor(Request $request){
        $departmentId = $request->input('cid') ?: $request->post('cid'); // Retrieve department from request
        $trimmedDept = strtolower(trim((string)$departmentId));
        try {
            $doctors = Doctors::whereRaw('LOWER(TRIM(departmentname)) = ?', [$trimmedDept])->orderBy('username', 'asc')->get();
        } catch (\Throwable $e) {
            $doctors = collect();
        }
        
        if ($doctors->isEmpty()) {
            return '<option value="">No doctors available for this department</option>';
        }

        $html = '<option value="">Select Doctor</option>';
        foreach($doctors as $doctor){
            $dutyBadge = $doctor->is_available ? '' : ' • [Off-Duty]';
            $html .= '<option value="'.$doctor->username.'">'.$doctor->username.$dutyBadge.'</option>';
        }
        return $html;
    }
    

  //-------------------------------------------------------contact_validates---------------------------------------------  

        public  function contact_validates(Request $req){

            $req->validate([
                'message'=>'required',
                'contactname'=>'required|regex:/^[a-zA-Z]+$/u|min:3|max:12',
                'email'=>'email:rfc,dns|required',
                'subject'=>'required',
                'phone'=>'required|numeric|digits:10',
            ],[
                'contactname.required' => 'the name field is required',

            ]);
            $contact = new Contact();
    
            // $doctor->departmentimage=$req->departmentimage;
            $contact->contactname=$req->contactname;
            $contact->email=$req->email;
            $contact->phone=$req->phone;
            $contact->subject=$req->subject;
            $contact->message=$req->message;

            if($contact->save()){
                $data = ['email'=>$req->email,'contactname'=>$req->contactname];
                Mail::send('emails.send_email_view_contact',['data'=>$data], function($message) use($data){
                    $message->to($data['email'],$data['contactname'])->subject('KK PATEL HOSPITAL');
                    $message->from('bgorasiya881@rku.ac.in','gorasiya bhoomin');
                 });


            if ($contact->save()) {
                session()->flash('success', 'Thanks for Contacting Us');
                
            }
            else {
                session()->flash('error', 'Contacting us  Failed');
                
           }
            return redirect('contacts');
        }        
    }
    //fectch contact
 
        // ------------------------------------------------------feedbackreview_validates------------------------------------

        public function feedbackreview_validates(Request $req){

            $req->validate([
                'message'=>'required',
                'name'=>'required|regex:/^[a-zA-Z]+$/u|min:3|max:12',
                'email'=>'required|email:rfc,dns',
            ],[

            ]);
            $feedback = new feedback();
            $feedback->name=$req->name;
            $feedback->email=$req->email;
            $feedback->message=$req->message;

            if($feedback->save()){
                $data = ['email'=>$req->email,'name'=>$req->name];
                Mail::send('emails.send_email_view_feedback',['data'=>$data], function($message) use($data){
                    $message->to($data['email'],$data['name'])->subject('KK PATEL HOSPITAL');
                    $message->from('bgorasiya881@rku.ac.in','gorasiya bhoomin');
                 });


            if ($feedback->save()) {
                session()->flash('success', 'Thanks for Feedback');
                
            }
            else {
                session()->flash('error', 'Feedback Failed');
                
           }
           return redirect('feedbackreview');
        }        
    }




    public function doctor_fetch_data_home()
    {
        try {
            $doctor_home = Doctors::all();
        } catch (\Throwable $e) {
            $doctor_home = collect();
        }
        return view('doctors',compact('doctor_home'));
    }

    public function department_fetch_home()
    {
        try {
            $std1 = department::all();
        } catch (\Throwable $e) {
            $std1 = collect();
        }
        return view('Department',compact('std1'));
    }

    public function press_fetch_data_home()
    {
        try {
            $pressData = press_desk::all();
        } catch (\Throwable $e) {
            $pressData = collect();
        }
        return view('Pressdesk', compact('pressData'));
    }
    
}
        
    
