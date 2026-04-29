<?php

use App\Models\Message;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AppointmentController;


// LOGIN REGISTRATION ROUTE START


//Homepage view
Route::get('/', [CustomAuthController::class, 'index'])->name('index');

//login interface view
Route::get('login', [CustomAuthController::class, 'login'])->name('login');

//Custom login authentication with validation
Route::post('login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');

//logout function session flush
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

//Register as doctor and patient view
Route::get('registration', [CustomAuthController::class, 'registration'])->name('registration');

//doctor registration view
Route::get('Doctor-registration', [CustomAuthController::class, 'DoctorReg'])->name('Doctor-registration');

//patient registration view
Route::get('Patient-registration', [CustomAuthController::class, 'PatientReg'])->name('Patient-registration');

//doctor registration submit
Route::post('Doctor-reg-post', [CustomAuthController::class, 'DoctorRegPost'])->name('Doctor-reg-post');

//patient registration submit
Route::post('Patient-reg-post', [CustomAuthController::class, 'PatientRegPost'])->name('Patient-reg-post');





//LOGIN REGISTRATION ROUTE END




//PATIENT ROUTE START

//patient dashboard view
Route::get('patient/dashboard', [PatientController::class, 'PatientDashboard'])->name('patient/dashboard')->middleware('patient');

//patient profile view with patientid passed through session
Route::get('patient/dashboard/profile/{id}', [PatientController::class, 'PatientProfile'])->name('patient.profile')->middleware('patient');

////patient edit profile view passed patient id
Route::get('/patient/dashboard/profile/{id}/edit',  [PatientController::class, 'PatientEditProfile'])->name('patient.edit')->middleware('patient');

//patient update profile submit
Route::put('/patient/dashboard/profile/{id}/update',  [PatientController::class, 'PatientUpdateProfile'])->name('patientprofile.update')->middleware('patient');

//patient checkout
Route::get('checkout/{id}', [PatientController::class, 'checkout'])->name('checkout')->middleware('patient');

//patient checkout post
Route::post('checkoutpost', [PatientController::class, 'checkoutpost'])->name('checkoutpost')->middleware('patient');


//payment history get
Route::get('payment.history/{id}', [PatientController::class, 'paymenthistory'])->name('payment.history')->middleware('patient');

//patient get messages
Route::get('patient/messages/{id}', [PatientController::class, 'patientmessage'])->name('patient.messages')->middleware('patient');

//patient get prescription
Route::get('patient/prescription/{id}', [PatientController::class, 'prescription'])->name('patient.prescription')->middleware('patient');

Route::get('/prescriptions/{id}/download', [PatientController::class, 'prescriptionDownload'])->name('prescriptions.download')->middleware('patient');



//PATIENT ROUTE END


//APPOINTMENT ROUTE START

//appointment view passed doctor id 
Route::get('appointments/{id}', [AppointmentController::class, 'Appointment'])->name('appointments.create')->middleware('patient');

//appointment submit
Route::post('appointment-created', [AppointmentController::class, 'CreateAppointment'])->name('appointment-created')->middleware('patient');

//appointment history
Route::get('appointment.history/{id}', [AppointmentController::class, 'AppointmentHistory'])->name('appointment.history')->middleware('patient');


//APPOINTMENT ROUTE END



//ADMIN ROUTE START



//Admin dashboard view
Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin/dashboard')->middleware('admin');

//createpackage view
Route::get('CreatepackageView', [AdminController::class, 'CreatepackageView'])->name('CreatepackageView')->middleware('admin');

//createpackage post
Route::post('CreatepackagePost', [AdminController::class, 'CreatepackagePost'])->name('CreatepackagePost')->middleware('admin');

//viewpackage post
Route::get('ViewpackageGet', [AdminController::class, 'ViewpackageGet'])->name('ViewpackageGet')->middleware('admin');

//Editpackage get
Route::get('EditpackageGet/{id}', [AdminController::class, 'EditpackageGet'])->name('EditpackageGet')->middleware('admin');

//UpdateID
Route::put('update.package/{id}', [AdminController::class, 'Updatepackage'])->name('update.package')->middleware('admin');

//Deleteid
Route::get('delete.package/{id}', [AdminController::class, 'Deletepackage'])->name('delete.package')->middleware('admin');

//earnings
Route::get('earning/history', [AdminController::class, 'earninghistory'])->name('earning.history')->middleware('admin');

// total patient
Route::get('show/patient', [AdminController::class, 'showpatient'])->name('show.patient')->middleware('admin');

//total doctor
Route::get('show/doctor', [AdminController::class, 'showdoctor'])->name('show.doctor')->middleware('admin');

//total appointment
Route::get('show/appointment', [AdminController::class, 'showappointment'])->name('show.appointment')->middleware('admin');

//create admin view
Route::get('create.admin', [AdminController::class, 'getadmin'])->name('create.admin')->middleware('admin');

//Admin registration submit
Route::post('post.admin', [AdminController::class, 'postadmin'])->name('post.admin')->middleware('admin');

//Admin registration submit
Route::post('contact.us', [AdminController::class, 'contactus'])->name('contact.us')->middleware('admin');

// total patient
Route::get('show.contact', [AdminController::class, 'showcontact'])->name('show.contact')->middleware('admin');




//ADMIN ROUTE END


//DOCTOR ROUTE START


//for viewing doctor
Route::get('DoctorsList', [DoctorController::class, 'Doctorslist'])->name('DoctorsList')->middleware('doctor');

//for viewing doctor
Route::get('doctor/dashboard/{Did}', [DoctorController::class, 'dashboard'])->name('doctor.dashboard')->middleware('doctor');

//doctor profile view with patientid passed through session
Route::get('doctor/dashboard/profile/{id}', [DoctorController::class, 'DoctorProfile'])->name('doctor.profile')->middleware('doctor');

////doctor edit profile view passed patient id
Route::get('/doctor/dashboard/profile/{id}/edit',  [DoctorController::class, 'DoctorEditProfile'])->name('doctor.edit')->middleware('doctor');

//doctor update profile submit
Route::put('/doctor/dashboard/profile/{id}/update',  [DoctorController::class, 'doctorUpdateProfile'])->name('doctorprofile.update')->middleware('doctor');


Route::get('appointments/approve/{id}', [DoctorController::class, 'approve'])->name('appointments.approve')->middleware('doctor');

Route::get('appointments/delete/{id}', [DoctorController::class, 'delete'])->name('appointments.delete')->middleware('doctor');

Route::post('appointments/sendmessage', [DoctorController::class, 'sendmessage'])->name('appointments.sendmessage')->middleware('doctor');

Route::get('prescription/appointment/{id}', [DoctorController::class, 'prescription'])->name('prescription.appointment')->middleware('doctor');

Route::post('prescription/send', [DoctorController::class, 'SendPrescription'])->name('prescription.send')->middleware('doctor');






//DOCTOR ROUTE END







