<?php

use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;

use Illuminate\Support\Facades\Route;

// -------------------------------------------------------Public Routes------------------------------------------------
Route::get('/', function () {
    return view('index');
});
Route::view('index', 'index');
Route::view('about', 'about');
Route::get('Doctors', [Homecontroller::class, 'doctor_fetch_data_home']);
Route::get('doctors', [Homecontroller::class, 'doctor_fetch_data_home']);
Route::get('Department', [Homecontroller::class, 'department_fetch_home']);
Route::get('department', [Homecontroller::class, 'department_fetch_home']);
Route::get('Pressdesk', [Homecontroller::class, 'press_fetch_data_home']);
Route::get('pressdesk', [Homecontroller::class, 'press_fetch_data_home']);
Route::view('gallery', 'gallery');
Route::view('contacts', 'contacts');
Route::post('contact_validates', [Homecontroller::class, 'contact_validates']);
Route::get('contact', [Homecontroller::class, 'contact_fetch_data']);
Route::view('feedbackreview', 'feedbackreview');
Route::post('feedbackreview_validates', [Homecontroller::class, 'feedbackreview_validates']);
Route::get('feedbackreviews', [Homecontroller::class, 'feedbackreview_fetch_data']);
Route::get('/appointment', [Homecontroller::class,'appointment']);
Route::post('appointmentform_validates', [Homecontroller::class, 'appointmentform_validates']);
Route::post('/getdoctor', [Homecontroller::class,'getdoctor']);
Route::post('/gettime', [Homecontroller::class,'gettime']);
Route::match(['get', 'post'], '/api/doctor-slots', [DoctorController::class, 'getDoctorSlots'])->name('doctor.slots.api');
Route::match(['get', 'post'], '/getdoctor-slots', [DoctorController::class, 'getDoctorSlots']);

//---------------------------------------------------- Admin Routes----------------------------------------------------
// Route::view('login', 'admin.login')->name('login');
// Route::post('login_user_validates', [Admincontroller::class, 'login_user_validates']);

//---------------------------------------example----------------------------------------
Route::get('/register', [Admincontroller::class,'loadRegister']);
Route::post('/register', [Admincontroller::class,'studentRegister'])->name('studentRegister');

Route::get('/kklogin123', function () {
    return redirect('/');
    
});

Route::get('/kklogin123', [Admincontroller::class,'loadLogin']);
Route::post('/kklogin123', [Admincontroller::class,'userLogin'])->name('userLogin');

Route::get('/logout', [Admincontroller::class,'logout']);

Route::get('/forget-password', [Admincontroller::class,'forgetPasswordLoad']);
Route::post('/forget-password', [Admincontroller::class,'forgetPassword'])->name('forgetPassword');

Route::get('/reset-password', [Admincontroller::class,'resetPasswordLoad']);
Route::post('/reset-password', [Admincontroller::class,'resetPassword'])->name('resetPassword');



Route::group(['middleware'=>['web','checkAdmin']],function(){
    Route::get('/admin/admindashboard', [Admincontroller::class,'admindashboard']);

Route::view('adminnavbar_master', 'admin.adminnavbar_master')->middleware('auth');
// Route::view('admindashboard', 'admin.admindashboard');
Route::get('admindashboard', [Admincontroller::class, 'admin_dashboard']);

// Doctors
Route::view('add_doctor', 'admin.add_doctor');
Route::view('edit_doctor', 'admin.edit_doctor');

Route::post('add_doctor', [Admincontroller::class, 'add_doctors'])->name('add_doctor');
Route::get('/add_doctor', [Admincontroller::class,'add_doctor']);
Route::get('admindoctors', [Admincontroller::class, 'doctor_fetch_data']);
Route::get('/edit_doctor/{email}', [Admincontroller::class, 'edit_doctor']);
Route::post('update_doctor', [Admincontroller::class, 'updatedoctor']);
Route::get('delete_doctor/{email}', [Admincontroller::class, 'deletedoctor']);

Route::get('/doctorsByDepartmentAndGenderCount', [Admincontroller::class, 'doctorsByDepartmentAndGenderCount']);



// Department routes
Route::view('admindepartments', 'admin.admindepartments');
Route::view('add_department', 'admin.add_department');
Route::view('edit_department', 'admin.edit_department');
Route::post('add_departments', [Admincontroller::class, 'add_departments']);
Route::get('admindepartments', [Admincontroller::class, 'department_fetch_data']);
Route::get('/edit_department/{id}', [Admincontroller::class, 'edit_department']);
Route::post('update_department', [Admincontroller::class, 'updatedepartment']);
Route::get('delete_department/{id}', [Admincontroller::class, 'deletedepartment']);

//change password
Route::view('admin_change_password', 'admin.admin_change_password');
Route::get('admin_change_password', [Admincontroller::class, 'showChangePasswordForm']);
Route::post('password_change', [Admincontroller::class, 'changePassword'])->name('password.change');

// Appointment
Route::view('adminappointments', 'admin.adminappointments');
Route::view('add_appointment', 'admin.add_appointment');
Route::get('/add_appointment', [Admincontroller::class,'add_appointment']);
Route::view('edit_apointment', 'edit_apointment');
Route::get('/edit_apointment', [Homecontroller::class,'edit_apointment']);
Route::post('add_appointment_validates', [Admincontroller::class, 'add_appointment_validates']);
Route::get('adminappointments', [Admincontroller::class, 'appointment_fetch_data']);
Route::get('/edit_appointment/{email}', [Admincontroller::class, 'edit_appointment']);
Route::get('/edit_appointment', [Homecontroller::class,'edit_appointment']);
Route::post('update_appointment', [Admincontroller::class, 'updateappointment']);
Route::get('delete_appointment/{email}', [Admincontroller::class, 'deleteappointment']);
Route::get('/admin/appointment/{id}/status/{status}', [Admincontroller::class, 'quick_status_update'])->name('admin.appointment.status');
Route::get('/admin/prescription/{id}', [Admincontroller::class, 'viewPrescription'])->name('admin.prescription.view');


// Feedback
Route::view('adminfeedback', 'admin.adminfeedback');
Route::get('adminfeedback', [Admincontroller::class, 'feedbackreview_fetch_data']);
Route::get('delete_feedback/{email}', [Admincontroller::class, 'deletefeedback']);

// Press Desk
Route::view('add_press_desk', 'admin.add_press_desk');
Route::view('edit_press_desk', 'admin.edit_press_desk');
Route::post('add_press_desk', [Admincontroller::class, 'add_press_desk']);
Route::get('adminpress', [Admincontroller::class, 'press_fetch_data']);
Route::get('/edit_press_desk/{id}', [Admincontroller::class, 'edit_press_desk']);
Route::post('update_press_desk/{id}', [Admincontroller::class, 'update_pressdesk']);
Route::get('delete_press_desk/{id}', [Admincontroller::class, 'delete_pressdesk']);

// Contact
Route::view('admincontact', 'admin.admincontact');
Route::view('reply_contact', 'admin.reply_contact');
Route::get('admincontact', [Admincontroller::class, 'contact_fetch_data']);
Route::get('/reply_contact/{email}', [Admincontroller::class, 'reply_contact']);
Route::post('update_contact', [Admincontroller::class, 'updatecontact']);
Route::get('delete_contact/{email}', [Admincontroller::class, 'deletecontact']);

// Admin Profile
Route::view('admin_profile', 'admin.admin_profile');
Route::view('admin_edit_profile', 'admin.admin_edit_profile');
Route::get('admin_profile', [Admincontroller::class, 'admin_profile_fetch_data']);
Route::get('admin_profile_design', [Admincontroller::class, 'admin_fetch_data_design']);
Route::get('/admin_edit_profile/{email}', [Admincontroller::class, 'admin_edit_profile']);
Route::post('update_admin_profile', [Admincontroller::class, 'update_adminprofiles']);

Route::view('500-error', 'admin.500-error');
Route::view('404-error', 'admin.404-error');

});

// ---------------------------------------------------- User / Patient Portal Routes ----------------------------------------------------

// Public Authentication
Route::get('/user/login', [UserController::class, 'showLogin'])->name('user.login');
Route::post('/user/login', [UserController::class, 'login'])->name('user.login.submit');
Route::get('/user/register', [UserController::class, 'showRegister'])->name('user.register');
Route::post('/user/register', [UserController::class, 'register'])->name('user.register.submit');
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');

// Convenient aliases for patient login/register
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);

// Authenticated Patient Portal Routes
Route::middleware(['web', 'auth'])->group(function() {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/dashboard', function() {
        if (\Illuminate\Support\Facades\Auth::user() && \Illuminate\Support\Facades\Auth::user()->is_admin == 1) {
            return redirect('/admin/admindashboard');
        }
        return redirect('/user/dashboard');
    });

    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/user/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');
    Route::post('/user/profile/password', [UserController::class, 'changePassword'])->name('user.password.change');

    Route::get('/user/book-appointment', [UserController::class, 'bookAppointment'])->name('user.appointment.book');
    Route::post('/user/book-appointment', [UserController::class, 'storeAppointment'])->name('user.appointment.store');

        Route::get('/user/appointment-history', [UserController::class, 'appointmentHistory'])->name('user.appointment.history');
    Route::get('/user/prescription/{id}', [UserController::class, 'viewPrescription'])->name('user.prescription.view');
    Route::post('/user/appointment/{id}/cancel', [UserController::class, 'cancelAppointment'])->name('user.appointment.cancel');

    Route::get('/user/doctors', [UserController::class, 'doctors'])->name('user.doctors');
    Route::get('/user/departments', [UserController::class, 'departments'])->name('user.departments');
});

// Digital OPD Consultation Slip (Accessible to Patient, Doctor, or Admin)
Route::get('/user/appointment/{id}/slip', [UserController::class, 'viewSlip'])->name('user.appointment.slip')->middleware('web');

// =============================================================================
// DOCTOR PANEL ROUTES (Dedicated Clinical Operations & Availability Console)
// =============================================================================

// Doctor Authentication (Guest / Public)
Route::get('/doctor/login', [DoctorController::class, 'showLoginForm'])->name('doctor.login');
Route::post('/doctor/login', [DoctorController::class, 'login'])->name('doctor.login.submit');
Route::get('/doctor/logout', [DoctorController::class, 'logout'])->name('doctor.logout');

// Authenticated Doctor Console
Route::middleware(['web', 'doctor.auth'])->group(function() {
    Route::get('/doctor/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
    Route::get('/doctor', function() {
        return redirect()->route('doctor.dashboard');
    });

    // My Appointments
    Route::get('/doctor/appointments', [DoctorController::class, 'appointments'])->name('doctor.appointments');
    Route::get('/doctor/appointment/{id}/slip', [DoctorController::class, 'viewSlip'])->name('doctor.appointment.slip');
    Route::post('/doctor/appointment/{id}/status', [DoctorController::class, 'updateAppointmentStatus'])->name('doctor.appointment.status');

    // Prescription Management
    Route::get('/doctor/appointment/{id}/prescription/create', [DoctorController::class, 'createPrescription'])->name('doctor.prescription.create');
    Route::post('/doctor/appointment/{id}/prescription', [DoctorController::class, 'storePrescription'])->name('doctor.prescription.store');
    Route::get('/doctor/prescription/{id}/edit', [DoctorController::class, 'editPrescription'])->name('doctor.prescription.edit');
    Route::post('/doctor/prescription/{id}/update', [DoctorController::class, 'updatePrescription'])->name('doctor.prescription.update');
    Route::get('/doctor/prescription/{id}', [DoctorController::class, 'viewPrescription'])->name('doctor.prescription.view');

    // Manage Time Slots (CRUD operation forms)
    Route::get('/doctor/time-slots', [DoctorController::class, 'timeSlots'])->name('doctor.time_slots');
    Route::post('/doctor/time-slots', [DoctorController::class, 'storeTimeSlot'])->name('doctor.time_slots.store');
    Route::post('/doctor/time-slots/{id}/update', [DoctorController::class, 'updateTimeSlot'])->name('doctor.time_slots.update');
    Route::get('/doctor/time-slots/{id}/toggle', [DoctorController::class, 'toggleTimeSlot'])->name('doctor.time_slots.toggle');
    Route::get('/doctor/time-slots/{id}/delete', [DoctorController::class, 'destroyTimeSlot'])->name('doctor.time_slots.delete');

    // My Schedule & Availability
    Route::get('/doctor/schedule', [DoctorController::class, 'schedule'])->name('doctor.schedule');
    Route::post('/doctor/schedule', [DoctorController::class, 'updateSchedule'])->name('doctor.schedule.update');
    Route::get('/doctor/schedule/toggle-duty', [DoctorController::class, 'toggleAvailability'])->name('doctor.schedule.toggle_duty');

    // My Patients
    Route::get('/doctor/patients', [DoctorController::class, 'patients'])->name('doctor.patients');

    // My Profile
    Route::get('/doctor/profile', [DoctorController::class, 'profile'])->name('doctor.profile');
    Route::post('/doctor/profile', [DoctorController::class, 'updateProfile'])->name('doctor.profile.update');

    // Change Password
    Route::get('/doctor/change-password', [DoctorController::class, 'changePassword'])->name('doctor.change_password');
    Route::post('/doctor/change-password', [DoctorController::class, 'updatePassword'])->name('doctor.password.update');
});
