<?php
namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\department;
use App\Models\press_desk;
use App\Models\Contact;
use App\Models\PasswordReset;
use App\Models\User;
use App\Models\feedback;
use App\Models\appointment;
use App\Models\Prescription;
use App\Models\PrescriptionMedicine;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Validator;






class Admincontroller extends Controller
{

    //dashboard 
    public function admindashboard()
    {
        $doctorCount = Doctors::count();
        $feedbackCount = feedback::count();
        $departmentcount= department::count();
        $appointmentcount = appointment::count();

        return view('admin.admindashboard', compact('doctorCount', 'feedbackCount','departmentcount','appointmentcount'));
    }

    public function doctorsByDepartmentAndGenderCount()
{
    $departments = Department::all();
    $departmentData = [];

    foreach ($departments as $department) {
        $maleCount = Doctors::where('departmentname', $department->departmentname)->where('gender', 'Male')->count();
        $femaleCount = Doctors::where('departmentname', $department->departmentname)->where('gender', 'Female')->count();
        
        $departmentData[$department->departmentname] = [
            'male' => $maleCount,
            'female' => $femaleCount,
        ];
    }

    return response()->json($departmentData);
}



//login
    public function loadRegister()
{   
    if(Auth::user() && Auth::user()->is_admin == 1){
        return redirect('/admin/dashboard');
    }
    if(Auth::user() && Auth::user()->is_admin == 0){
        return redirect('/dashboard');
    }
    return view('register');
}

public function studentRegister(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email:rfc,dns|unique:users,email',
        'password' => 'required|min:6',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/kklogin123')->with("success", 'Registration successful. You can now log in.');
}

    public function loadLogin()
    {
        if(Auth::user() && Auth::user()->is_admin == 1){
        return view('admin.admindashboard')->with("success", 'Registration successful. You can now log in.');
    }
    if(Auth::user() && Auth::user()->is_admin == 0){
        return redirect('/dashboard');
    }

        return view('kklogin123');
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'email' =>'required',
            'password'=>'required'
        ]);
        $userCredential = $request->only('email','password');
        if(Auth::attempt($userCredential)){
            $user = \App\Models\User::whereKey(Auth::id())->firstOrFail();
        $user->status = 'active'; // Set status to "active"
        $user->save();

            if(Auth::user()->is_admin == 1){
                return redirect('/admin/admindashboard')->with("success", 'Hi! ' . $user->name);
            }
            else{
                return redirect('/dashboard');
            }

        }
        else{
            
            $user = \App\Models\User::where('email', $request->email)->first();

            if ($user) {
                // Incorrect password
                return back()->with("error", 'Password is incorrect');
            } else {
                // Incorrect username
                return back()->with("error", 'Username is incorrect');
            }      
          }
    }

    public function loadDashboard()
    {
        return view('student.dashboard');
    }


    public function logout(Request $request)
    {
            $user = User::whereKey(Auth::id())->firstOrFail();
            $user->status = 'inactive'; // Set status to "inactive"
            $user->save();
        $request->session()->flush();
        Auth::logout();
        return redirect('/kklogin123')->with("success", 'Log out successfully.');
    }
    

    

    public function forgetpasswordLoad(){
        return view('forget-password');
    }


    public function forgetPassword(Request $request){

        try{
            $user= User::where('email',$request->email)->get();
            if(count($user) > 0){

                $token = Str::random(40);
                $domain = URL::to('/');
                $url = $domain.'/reset-password?token='.$token;

                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = 'password Reset';
                $data['body'] = 'please check  below link';

                Mail::send('emails.forgetPasswordMail',['data'=>$data],function($message) use ($data){

                        $message->to($data['email'])->subject('Forgot Password');
                });

                $dateTime = Carbon::now()->format('Y-m-d H:i:s');
                PasswordReset::updateOrCreate(
                    ['email'=>$request->email],
                [
                    'email' =>$request->email,
                    'token'=>$token,
                    'created_at'=>$dateTime
                ]
                );
                return back()->with('success','check email');

            }
            else{
                return back()->with('error','email is not exists');

            }
        }catch(\Exception $e){
            return back()->with('error',$e->getmessage());
        }
    }

    public function  resetPasswordLoad(Request $request){
        
        $resetData = PasswordReset::where('token',$request->token)->get();

        if(isset($request->token) && count($resetData) >0){
            $user= User::where('email',$resetData[0]['email'])->first();
            return  view('resetPassword',compact('user'));

        }
        else{
            return view('404');
        }
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:users,id',
            'password' => 'required|min:6|confirmed',
        ]);
    
        $user = User::find($request->id);
    
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
    
            PasswordReset::where('email', $user->email)->delete();
            
            return redirect('kklogin123')->with('success', 'Password changed successfully');
        }
    
        return back()->with('error', 'User not found');

    }


// ------------------------------------------------------doctors----------------------------------------------
public function add_doctors(Request $req){
    $req->validate([
        'username'=>'required|regex:/^[a-zA-Z]+/u|min:3',
        'email'=>'required|email:rfc,dns',
        'password'=>'required|min:6|confirmed',
        'dob'=>'required',
        'gender'=>'required',
        'address'=>'required',
        'departmentname'=>'required',
        'city'=>'required',
        'postal_code'=>'required|numeric',
        'CV'=>'required|mimes:pdf,doc,docx',
        'phone'=>'required',
        'Avatar'=>'required|mimes:jpg,png,jpeg|image',
        'Bio'=>'required',
    ],
    [
        'password.required' => 'Please provide a password for the doctor portal account.',
        'password.min' => 'Doctor password must be at least 6 characters.',
        'password.confirmed' => 'Password confirmation does not match.',
    ]); 
    $doctor = new Doctors();
    $doctor->username=$req->username;
    $doctor->email=$req->email;
    $doctor->password=Hash::make($req->password);
    $doctor->dob=$req->dob;
    $doctor->gender=$req->gender;
    $doctor->address=$req->address;
    $doctor->departmentname=$req->departmentname;
    $doctor->city=$req->city;
    $doctor->postal_code=$req->postal_code;
    $doctor->CV=$req->CV;
    $doctor->phone=$req->phone;
    $doctor->Bio=$req->Bio;
    $doctor->is_available=1;
    $doctor->room_no='OPD Room #' . rand(101, 120);
    $doctor->qualification='MBBS, MD';
    $doctor->consultation_fee=500;
    
if($req->hasfile('CV'))
{
    $file = $req->file('CV');
    $extension = $file->getClientOriginalExtension();
    $filename = time().'.'.$extension;
    $file->move('uploads/CV',$filename);
    $doctor->CV = $filename;
}



// if($req->hasfile('Avatar'))
// {
//     $file = $req->file('Avatar');
//     $extension = $file->getClientOriginalExtension();
//     $filename = time().'.'.$extension;
//     $file->move('uploads/doctors',$filename);
//     $doctor->Avatar = $filename;
// }

if ($req->hasfile('Avatar')) {
    $file = $req->file('Avatar');
    $avatar_path = 'uploads/doctors/' . $file->getClientOriginalName();

    // Move the uploaded file to the desired directory
    $file->move('uploads/doctors/', $file->getClientOriginalName());

    // Save the file path to the 'pressimage' attribute
    $doctor->Avatar = $avatar_path;
}

    if ($doctor->save()) {
        // Initialize default time slots for the new doctor
        $defaultSlots = [
            ['day_of_week' => 'All Days', 'start_time' => '09:00 AM', 'end_time' => '10:00 AM', 'slot_display' => '09:00 AM - 10:00 AM', 'max_patients' => 8, 'is_active' => 1],
            ['day_of_week' => 'All Days', 'start_time' => '10:00 AM', 'end_time' => '11:00 AM', 'slot_display' => '10:00 AM - 11:00 AM', 'max_patients' => 8, 'is_active' => 1],
            ['day_of_week' => 'All Days', 'start_time' => '11:00 AM', 'end_time' => '12:00 PM', 'slot_display' => '11:00 AM - 12:00 PM', 'max_patients' => 6, 'is_active' => 1],
            ['day_of_week' => 'All Days', 'start_time' => '04:00 PM', 'end_time' => '05:00 PM', 'slot_display' => '04:00 PM - 05:00 PM', 'max_patients' => 8, 'is_active' => 1],
            ['day_of_week' => 'All Days', 'start_time' => '05:00 PM', 'end_time' => '06:00 PM', 'slot_display' => '05:00 PM - 06:00 PM', 'max_patients' => 8, 'is_active' => 1],
        ];
        foreach ($defaultSlots as $slot) {
            \App\Models\DoctorTimeSlot::create([
                'doctor_id' => $doctor->id,
                'day_of_week' => $slot['day_of_week'],
                'start_time' => $slot['start_time'],
                'end_time' => $slot['end_time'],
                'slot_display' => $slot['slot_display'],
                'max_patients' => $slot['max_patients'],
                'is_active' => $slot['is_active'],
            ]);
        }

        // Initialize 7-day schedule
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        foreach ($days as $day) {
            $isSunday = ($day === 'Sunday');
            \App\Models\DoctorSchedule::create([
                'doctor_id' => $doctor->id,
                'day_name' => $day,
                'morning_start' => $isSunday ? null : '09:00 AM',
                'morning_end' => $isSunday ? null : '01:00 PM',
                'evening_start' => $isSunday ? null : '04:00 PM',
                'evening_end' => $isSunday ? null : '07:30 PM',
                'is_day_off' => $isSunday ? 1 : 0,
                'notes' => $isSunday ? 'Weekly Off' : 'Regular Consultations',
            ]);
        }

        session()->flash('success', 'Doctor Onboarded Successfully with Portal Password.');
    }
    else {
        session()->flash('error', 'Doctor  Failed');
   }
    return redirect('add_doctor');
}

public function add_doctor(Request $request)
{
    $departments = department::orderBy('departmentname', 'asc')->get(); // Fetch departments from the database
    return view('admin.add_doctor', compact('departments')); // Pass departments to the view
}

//-----------------------fetch data of doctors--------------
//home
public function doctor_fetch_data_home()
    {
    
        $doctor_home = Doctors::all();
    
       //  return $std;
       return view(view()->exists('Doctors') ? 'Doctors' : 'doctors', compact('doctor_home'));
    }
//admin
    public function doctor_fetch_data()
    {
    
        $std = Doctors::all();
       return view('admin.admindoctors',compact('std'));
    }
//----------------------------edit data of doctor----------------
public function edit_doctor($email)
{
    $std = Doctors::where('email', $email)->get();
    $departments = Department::orderBy('departmentname', 'asc')->get(); // Fetch departments

    return view('admin.edit_doctor', compact('std', 'departments')); // Pass both $std and $departments to the view
}

// public function edit_appointment($email)
//     {
//         $departments = Department::orderBy('departmentname', 'asc')->get(); // Fetch departments
//         $std3 = Appointment::where('email', $email)->get();
//         return view('admin.edit_appointment', compact('std3', 'departments'));
//     }

//------------------------------update data of doctor----------
public function updatedoctor(Request $request)
{
    $doctor = Doctors::where('email', $request->email)->first();

    // Update Avatar file
    if ($request->hasFile('Avatar')) {
        $avatar_path = 'uploads/doctors/' . uniqid() . $request->file('Avatar')->getClientOriginalName();
        $request->file('Avatar')->move('uploads/doctors/', $avatar_path);
        $doctor->update(['Avatar' => $avatar_path]);
    }

    // Update CV file
    if ($request->hasFile('CV')) {
        $cv_path = 'uploads/CV/' . uniqid() . $request->file('CV')->getClientOriginalName();
        $request->file('CV')->move('uploads/CV/', $cv_path);
        $doctor->update(['CV' => $cv_path]);
    }

    // Update other fields
    $doctor->update([
        'username' => $request->username,
        'dob' => $request->dob,
        'gender' => $request->gender,
        'address' => $request->address,
        'departmentname' => $request->departmentname,
        'city' => $request->city,
        'postal_code' => $request->postal_code,
        'phone' => $request->phone,
        'Bio' => $request->Bio,
    ]);

    if ($request->filled('password')) {
        $doctor->password = Hash::make($request->password);
        $doctor->save();
    }

    return redirect('admindoctors')->with('success', 'Doctor updated successfully');
}

//--------------delete data of doctor-----------------
public function deletedoctor($email)
{
    // Find the doctor by email
    $doctor = Doctors::where('email', $email)->first();

    // Check if the doctor exists
    if ($doctor) {

        $doctor->delete();

        // Redirect to the doctor list or any other desired page
        return redirect('admindoctors')->with('success', 'Doctor deleted successfully');
    } else {
        // Redirect to the doctor list or any other desired page with an error message
        return redirect('admindoctors')->with('error', 'Doctor not found');
    }
}

// ------------------------------------------------------ department----------------------------------------------
//add departmnt---------------
public function add_departments(Request $req){
        
    $req->validate([
        'departmentname'=>'required|regex:/^[a-zA-Z]+/u|min:3',
        'departmenthead'=>'required',
        'departmentimage'=>'required|mimes:jpg,png,jpeg|image',
        'description'=>'required',
    ],[
        'departmentname.required' => 'username cannot be empty',


        'departmentimage.required' =>'The Image field is required',
        'departmentimage.mimes' =>'The Image field should be in jpg,png or jpeg format',

        'description.required' =>'The description field is required',

    ]);
    $departments = new department();
    
    // $doctor->departmentimage=$req->departmentimage;
    $departments->departmentname=$req->departmentname;
    $departments->departmenthead=$req->departmenthead;
    $departments->description=$req->description;


if ($req->hasfile('departmentimage')) {
    $file = $req->file('departmentimage');
    $department_path = 'uploads/Departments/' . $file->getClientOriginalName();

    // Move the uploaded file to the desired directory
    $file->move('uploads/Departments/', $file->getClientOriginalName());

    // Save the file path to the 'pressimage' attribute
    $departments->departmentimage = $department_path;
}
    if ($departments->save()) {
        session()->flash('success', 'Department Added Successfully');
        
    }
    else {
        session()->flash('error', 'Department   Failed');
        
   }
    return redirect('add_department');
}

//--------------------fetch department data-----------------
public function department_fetch_data()
    {
    
        $std2 = department::all();
    
       //  return $std;
       return view('admin.admindepartments',compact('std2'));
    }

    
// ---------------------edit department data----------------

// public function edit_department($id)
// {
//     $department = department::find($id);

//     return view('admin.edit_department', compact('department'));
// }

//---------------------update data of department---------------

public function edit_department($id)
{
    $department = Department::find($id);

    return view('admin.edit_department', compact('department'));
}

public function updatedepartment(Request $request)
{
    // Validate incoming request
    $request->validate([
        'departmentname' => 'required|regex:/^[a-zA-Z]+/u|min:3',
        'departmenthead' => 'required',
        'departmentimage' => 'nullable|mimes:jpg,png,jpeg|image',
        'description' => 'required',
    ]);

    // Retrieve the department
    $department = Department::find($request->id);

    // Check if the department exists
    if ($department) {
        // Update Avatar file if provided
        if ($request->hasFile('departmentimage')) {
            $department_path = 'uploads/Departments/' . uniqid() . $request->file('departmentimage')->getClientOriginalName();
            $request->file('departmentimage')->move('uploads/Departments/', $department_path);
            $department->departmentimage = $department_path;
        }

        // Update other fields
        $department->departmentname = $request->departmentname;
        $department->departmenthead = $request->departmenthead;
        $department->description = $request->description;

        // Save changes
        $department->save();

        return redirect('admindepartments')->with('success', 'Department updated successfully');
    } else {
        // Handle the case where the department doesn't exist
        return redirect('admindepartments')->with('error', 'Department not found');
    }
}

//-delete data of department
public function deletedepartment($id)
{
    // Find the doctor by email
    $department = department::where('id', $id)->first();

    // Check if the doctor exists
    if ($department) {
        $department->delete();
     return redirect('admindepartments')->with('success', 'Department deleted successfully');
    } else {
        return redirect('admindoctors')->with('error', 'Department not found');
    }
}


//----------------------------------------------- press Desk-------------------------------------------------
//add press--------
public function add_press_desk(Request $req){
        
    $req->validate([
    
        'pressimage'=>'required|mimes:jpg,png,jpeg|image',
        'description'=>'required',
    ],[
        'pressimage.required' =>'The Image field is required',
        'pressimage.mimes' =>'The Image field should be in jpg,png or jpeg format',

        'description.required' =>'The description field is required',

    ]);
    $press = new press_desk();
   
    $press->description=$req->description;
        if ($req->hasfile('pressimage')) {
        $file = $req->file('pressimage');
        $press_path = 'uploads/Press/' . $file->getClientOriginalName();
    
        // Move the uploaded file to the desired directory
        $file->move('uploads/Press/', $file->getClientOriginalName());
    
        // Save the file path to the 'pressimage' attribute
        $press->pressimage = $press_path;
    }
    

    if ($press->save()) {
        session()->flash('success', 'Press Added Successfully');
    }
    else {
        session()->flash('error', 'Press  Failed');
   }
     return redirect('add_press_desk');
}

//--------------------fetch department data-----------------
//home

//admin
    public function press_fetch_data()
    {
    
        $std = press_desk::all();
    
       //  return $std;
       return view('admin.adminpress',compact('std'));
    
    }
// ---------------------edit department data----------------

public function edit_press_desk($id)
    {
        $std2 = press_desk::where('id', $id)->get();

        return view('admin.edit_press_desk', compact('std2'));
    }
//---------------------update data of department---------------
public function update_pressdesk(Request $request)
{
    $rules = [
      
        'description' => 'required',

        'pressimage' => 'required|mimes:jpg,png,jpeg|image',
        // 'image'=>'required'
    ];
    $custom_error = [

    ];

    $request->validate($rules, $custom_error);

    $press = press_desk::where('id', $request->id)->first();
    
    if ($request->hasFile('pressimage')) {
        $press_path = 'uploads/Press/' . uniqid() . $request->file('pressimage')->getClientOriginalName();
        $request->file('pressimage')->move('uploads/Press/', $press_path);
        $press->update(['pressimage' => $press_path]);
    }

    // Update other fields
    $press->update([
        'description' => $request->description,
    ]);

    return redirect('adminpress')->with('success', 'Press Desk updated successfully.........');

}

//-delete data of department
public function delete_pressdesk($id)
{
    // Find the doctor by email
    $press = press_desk::where('id', $id)->first();

    // Check if the doctor exists
    if ($press) {
        // Delete the doctor's records
        $press->delete();

        // Redirect to the doctor list or any other desired page
        return redirect('adminpress')->with('success', 'Press deleted successfully');
    } else {
        // Redirect to the doctor list or any other desired page with an error message
        return redirect('adminpress')->with('error', 'Press not found');
    }
}
// --------------------------------------------------appointment---------------------------------------------------
public function add_appointment_validates(Request $req){
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
            'date.before_or_equal' => 'Appointment date exceeds the allowed 30-day monthly schedule window.',
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
                    'username' => "Dr. {$doctorRecord->username} is currently Off-Duty (Out of Office) and not accepting appointments. Please choose an available doctor."
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
        
            
            if($appointment->save()){
                $data = ['email'=>$req->email,'appointmentname'=>$req->appointmentname];
                Mail::send('emails.send_email_view_home_appointment',['data'=>$data], function($message) use($data){
                    $message->to($data['email'],$data['appointmentname'])->subject('KK PATEL HOSPITAL');
                    $message->from('bgorasiya881@rku.ac.in','gorasiya bhoomin');
                 });
        
        
            if ($appointment->save()) {
                session()->flash('success', 'Thanks for Booking An Appointment');
                
            }
            else {
                session()->flash('error', 'Appointmnet Failed');
                
           }
                return redirect('add_appointment');
            }
        }

    public function add_appointment(Request $request){
		$data['departments']=DB::table('department')->orderBy('departmentname','asc')->get();
		return view('admin.add_appointment',$data);
	}

    public function edit_apointment(Request $request){
		$data['departments']=DB::table('department')->orderBy('departmentname','asc')->get();
		return view('admin.edit_appointment',$data);
	}

    public function getdoctor(Request $request){
        $departmentId = $request->post('cid'); // Retrieve department ID from the request
        $doctors = Doctors::where('departmentname', $departmentId)->orderBy('username', 'asc')->get(); // Fetch doctors based on department ID
        $html = '<option value="">Select doctors</option>';
        foreach($doctors as $doctor){
            $html .= '<option value="'.$doctor->username.'">'.$doctor->username.'</option>';
        }
        return $html;
    }
    public function appointment_fetch_data()
    {
        $std3 = appointment::with('prescription.medicines')->orderBy('id', 'desc')->get();
        return view('admin.adminappointments', compact('std3'));
    }

    /**
     * View Prescription (Admin read-only access)
     */
    public function viewPrescription($id)
    {
        $prescription = Prescription::with(['medicines', 'appointment', 'doctor', 'patient'])->findOrFail($id);
        $role = 'admin';
        $backUrl = url('/adminappointments');

        return view('prescription.view', compact('prescription', 'role', 'backUrl'));
    }

    public function edit_appointment($email)
    {
        $departments = Department::orderBy('departmentname', 'asc')->get(); // Fetch departments
        if (is_numeric($email)) {
            $std3 = Appointment::with('prescription.medicines')->where('id', $email)->get();
            if ($std3->isEmpty()) {
                $std3 = Appointment::with('prescription.medicines')->where('email', $email)->get();
            }
        } else {
            $std3 = Appointment::with('prescription.medicines')->where('email', $email)->get();
        }
        return view('admin.edit_appointment', compact('std3', 'departments'));
    }
    
    
    public function updateappointment(Request $request)
    {
        $rules = [
            'appointmentname' => 'required|regex:/^[a-zA-Z]+$/u|min:3|max:12',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|digits:10',
            'departmentname' => 'required',
            'username' => 'required',
            'date' => 'required',
            'time' => 'required',
            'message' => 'required',
            'gender' => 'required',
            'Status' => 'required',
        ];
    
        $custom_error = [];
    
        $request->validate($rules, $custom_error);
        if ($request->filled('id')) {
            $appointment = appointment::find($request->id);
        }
        if (empty($appointment)) {
            $appointment = appointment::where('email', $request->email)->first();
        }
    
        // Update other fields
        $day = $request->input('day');
        if (empty($day) && $request->filled('date')) {
            try {
                $day = \Carbon\Carbon::parse($request->date)->format('l');
            } catch (\Exception $e) {
                $day = null;
            }
        }

        $appointment->update([
            'appointmentname' => $request->appointmentname,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'departmentname' => $request->departmentname,
            'username' => $request->username,
            'date' => $request->date,
            'day' => $day,
            'time' => $request->time,
            'message' => $request->message,
            'Status' => $request->Status,
        ]);
    
        if ($appointment->save()) {
            $data = [
                'appointmentname' => $request->appointmentname,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'departmentname' => $request->departmentname,
                'username' => $request->username,
                'date' => $request->date,
                'time' => $request->time,
                'message' => $request->message,
                'Status' => $request->Status,
            ];
    
            try {
                if ($request->Status == 'Approved') {
                    Mail::send('emails.send_email_appointment_approved', ['data' => $data], function ($message) use ($data) {
                        $message->to($data['email'], $data['appointmentname'], $data['phone'], $data['gender'], $data['departmentname'], $data['username'], $data['date'], $data['time'], $data['message'], $data['Status'])->subject('Appointment Approved');
                        $message->from('bgorasiya881@rku.ac.in', 'gorasiya bhoomin');
                    });
                } elseif ($request->Status == 'Rejected') {
                    Mail::send('emails.send_email_appointment_rejected', ['data' => $data], function ($message) use ($data) {
                        $message->to($data['email'], $data['appointmentname'], $data['phone'], $data['gender'], $data['departmentname'], $data['username'], $data['date'], $data['time'], $data['message'], $data['Status'])->subject('Appointment Rejected');
                        $message->from('bgorasiya881@rku.ac.in', 'gorasiya bhoomin');
                    });
                }
            } catch (\Throwable $ex) {
                // If mail driver fails (e.g. offline local mail), continue gracefully
            }
    
            return redirect('adminappointments')->with('success', 'Appointment #' . $appointment->id . ' updated successfully.');
        }
    }
    
    public function quick_status_update($id, $status)
    {
        $appointment = is_numeric($id) ? appointment::find($id) : appointment::where('email', $id)->first();
        if (!$appointment) {
            return redirect('adminappointments')->with('error', 'Appointment not found.');
        }

        $validStatuses = ['Approved', 'Pending', 'Rejected', 'Cancelled', 'Completed'];
        $matchingStatus = null;
        foreach ($validStatuses as $vs) {
            if (strcasecmp($vs, $status) === 0) {
                $matchingStatus = $vs;
                break;
            }
        }
        if (!$matchingStatus) {
            $matchingStatus = ucfirst(strtolower($status));
        }

        $appointment->Status = $matchingStatus;
        $appointment->save();

        return redirect('adminappointments')->with('success', 'Appointment #' . $appointment->id . ' marked as ' . $matchingStatus . ' successfully.');
    }

    public function deleteappointment($email)
    {
        // Find by id or email
        $appointment = is_numeric($email)
            ? (appointment::find($email) ?? appointment::where('email', $email)->first())
            : appointment::where('email', $email)->first();

        // Check if the appointment exists
        if ($appointment) {
            $deletedId = $appointment->id;
            $appointment->delete();

            return redirect('adminappointments')->with('success', 'Appointment #' . $deletedId . ' deleted successfully.');
        } else {
            return redirect('adminappointments')->with('error', 'Appointment not found.');
        }
    }
 //----------------------------------------admin profile---------------------------------------   

 //fetch admin profile data--
 public function admin_profile_fetch_data()
 {
     $std3 = User::all();
     return view('admin.admin_profile', compact('std3'));
 }
 
 public function admin_fetch_data_design()
 {
     $std3 = User::all();
     return view('admin.adminnavbar_master', compact('std3'));
 }
//edit admin-- 
public function admin_edit_profile($email)
{
    $std3 = User::where('email', $email)->get();
    return view('admin.admin_edit_profile', compact('std3'));
}




public function update_adminprofiles(Request $request)
{
    // Find the admin record by email
    $std3 = User::where('email', $request->email)->first();

    // Check if the record exists
    if ($std3) {
        // Update Avatar file
        if ($request->hasFile('logo')) {
            $logo_path = 'uploads/edit_admin_profile/' . uniqid() . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move('uploads/edit_admin_profile/', $logo_path);
            $std3->update(['logo' => $logo_path]);
        }

        // Update other fields
        // Change $doctor to $admin
        $std3->update([
            'name' => $request->name,
            //'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
        ]);

        return redirect('admin_profile')->with('success', 'Profile updated successfully');
   
}


}


//---------------------------------------------Change password-------------------------
// use App\Models\Admin; // Adjust the namespace if needed

public function showChangePasswordForm()
    {
        return view('admin.admin_change_password');
    }
// Admincontroller.php

public function changePassword(Request $request)
{
    $request->validate([
        'old_pass' => 'required',
        'current_pass' => 'required|min:6|confirmed',
        'current_pass_confirmation' => 'required',
    ]);

    if (!Auth::check()) {
        return redirect()->route('kklogin123')->with('error', 'User not authenticated');
    }

    /** @var \Illuminate\Database\Eloquent\Model $user */
    $user = Auth::user();

    if (!Hash::check($request->old_pass, $user->password)) {
        return redirect()->back()->with('error', 'The provided old password is incorrect.');
    }

    $user->password = Hash::make($request->current_pass);
    $user->save();

    return redirect()->back()->with('success', 'Password changed successfully.');
}




//----------------------------contact---------------
public function contact_fetch_data()
{

    $std1 = Contact::all();

   //  return $std;
   return view('admin.admincontact',compact('std1'));
}
//edit reply
    public function reply_contact($email)
{
    $std1 = Contact::where('email', $email)->get();

    return view('admin.reply_contact', compact('std1'));
}
//update reply
public function updatecontact(Request $request)
{
$rules = [

    'replied' => 'required',

    // 'image'=>'required'
];
$custom_error = [

];

$request->validate($rules, $custom_error);
$contact = Contact::where('email', $request->email)->first();

// Update other fields
$contact->update([
    'replied' => $request->replied,
]);

if ($contact->save()) {
    $data = [
        'email' => $request->email,
        'contactname' => $request->contactname,
        'replied' => $request->replied,
    ];

    Mail::send('emails.send_email_reply_contact', ['data' => $data], function ($message) use ($data) {
        $message->to($data['email'], $data['contactname'])->subject('KK PATEL HOSPITAL');
        $message->from('bgorasiya881@rku.ac.in', 'gorasiya bhoomin');
    });

    return redirect('admincontact')->with('success', 'Reply Done successfully');
}

}

public function deletecontact($email)
{
    // Find the doctor by email
    $contact = Contact::where('email', $email)->first();

    // Check if the doctor exists
    if ($contact) {
        // Delete the doctor's records
        $contact->delete();

        // Redirect to the doctor list or any other desired page
        return redirect('admincontact')->with('success', 'contact deleted successfully');
    } else {
        // Redirect to the doctor list or any other desired page with an error message
        return redirect('admincontact')->with('error', 'contact not found');
    }
}
// --------------------feedback
public function feedbackreview_fetch_data()
{

    $std1 = feedback::all();

   //  return $std;
   return view('admin.adminfeedback',compact('std1'));
}

public function deletefeedback($email)
{
    // Find the doctor by email
    $feedback = feedback::where('email', $email)->first();

    // Check if the doctor exists
    if ($feedback) {
        // Delete the doctor's records
        $feedback->delete();

        // Redirect to the doctor list or any other desired page
        return redirect('adminfeedback')->with('success', 'feedback deleted successfully');
    } else {
        // Redirect to the doctor list or any other desired page with an error message
        return redirect('adminfeedback')->with('error', 'feedback not found');
    }
}

// -------------------------------------------------------users----------------------------------------------
public function user_fetch_data()
{
    $users = User::where('is_admin', 0)->orderBy('name', 'asc')->get();

    return view('admin.adminusers', compact('users'));
}

public function deleteuser($email)
{
    $user = User::where('email', $email)->first();

    if ($user) {
        $user->delete();

        return redirect('adminusers')->with('success', 'User deleted successfully');
    } else {
        return redirect('adminusers')->with('error', 'User not found');
    }
}



}

    


