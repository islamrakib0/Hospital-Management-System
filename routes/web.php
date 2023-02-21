<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard')->middleware('auth');

//Login
Route::get('/login', function () {return view('auth.login', ['pageTitle' => 'Admin Login']);})->middleware('guest')->name('login');
Route::get('/patient-login', function () {return view('auth.login', ['pageTitle' => 'Patient Login']);})->middleware('guest')->name('patient-login');
Route::get('/doctor-login', function () {return view('auth.login', ['pageTitle' => 'Doctor Login']);})->middleware('guest')->name('doctor-login');
Route::get('/receptionist-login', function () {return view('auth.login', ['pageTitle' => 'Receptionist Login']);})->middleware('guest')->name('receptionist-login');

//Register
Route::get('/patient-register', function () {return view('auth.register', ['pageTitle' => 'Patient Register']);})->middleware('guest')->name('patient-register');
Route::get('/doctor-register', function () {return view('auth.register', ['pageTitle' => 'Doctor Register']);})->middleware('guest')->name('doctor-register');
Route::get('/admin-register', function () {return view('auth.register', ['pageTitle' => 'Admin Register']);})->middleware('guest')->name('admin-register');

//Logout
Route::get('/logout', function(){ auth()->logout(); return redirect('/login');});

Auth::routes();

//Profile
Route::get('/profile', 'ProfileController@show')->name('profile')->middleware('auth');
Route::post('/profile', 'ProfileController@update')->name('profile.update')->middleware('auth');
Route::get('/profile/delete', 'ProfileController@edit')->name('profile.delete')->middleware('auth');
Route::delete('/profile/delete', 'ProfileController@destroy')->name('profile.delete.confirm')->middleware('auth');

//User Management
Route::get('/users', 'UserController@index')->name('admin.users')->middleware('auth');
Route::get('/users/create', 'UserController@create')->name('admin.user.create')->middleware('auth');
Route::post('/users/create', 'UserController@store')->name('admin.user.store')->middleware('auth');
Route::get('/users/{user}', 'UserController@show')->name('admin.user')->middleware('auth');
Route::post('/users/{user}', 'UserController@update')->name('admin.user.update')->middleware('auth');
Route::get('/users/{user}/delete', 'UserController@destroy')->name('admin.user.delete')->middleware('auth');

//Patient Management
Route::get('/patients', 'PatientController@index')->name('patients')->middleware('auth');
Route::get('/patients/create', 'PatientController@create')->name('patient.create')->middleware('auth');
Route::post('/patients/create', 'PatientController@store')->name('patient.store')->middleware('auth');
Route::get('/patients/{patient}', 'PatientController@show')->name('patient')->middleware('auth');
Route::post('/patients/{patient}', 'PatientController@update')->name('patient.update')->middleware('auth');
Route::get('/patients/{patient}/delete', 'PatientController@destroy')->name('patient.delete')->middleware('auth');

//Doctor Management
Route::get('/doctors', 'DoctorController@index')->name('doctors')->middleware('auth');
Route::get('/doctors/create', 'DoctorController@create')->name('doctor.create')->middleware('auth');
Route::post('/doctors/create', 'DoctorController@store')->name('doctor.store')->middleware('auth');
Route::get('/doctors/{user}/delete', 'DoctorController@destroy')->name('doctor.delete')->middleware('auth');


//Appoinment Management
Route::get('/appointments', 'AppointmentController@index')->name('appointments')->middleware('auth');
Route::get('/appointments/create', 'AppointmentController@create')->name('appointment.create')->middleware('auth');
Route::post('/appointments/create', 'AppointmentController@store')->name('appointment.store')->middleware('auth');
Route::get('/appointments/{appointment}/view', 'AppointmentController@show')->name('appointment.view')->middleware('auth');
Route::post('/appointments/{appointment}/view', 'AppointmentController@updateStatus')->name('appointment.updateStatus')->middleware('auth');
Route::get('/appointments/{appointment}/edit', 'AppointmentController@edit')->name('appointment.edit')->middleware('auth');
Route::post('/appointments/{appointment}/edit', 'AppointmentController@update')->name('appointment.update')->middleware('auth');
Route::post('/appointments/{appointment}', 'AppointmentController@update')->name('appointment.update')->middleware('auth');
Route::get('/appointments/{appointment}/delete', 'AppointmentController@destroy')->name('appointment.delete')->middleware('auth');


//Timeslot Management
Route::get('/timeslots', 'TimeslotController@index')->name('timeslots')->middleware('auth');
Route::get('/timeslots/create', 'TimeslotController@create')->name('timeslot.create')->middleware('auth');
Route::post('/timeslots/create', 'TimeslotController@store')->name('timeslot.store')->middleware('auth');
Route::get('/timeslots/{timeslot}/edit', 'TimeslotController@edit')->name('timeslot.edit')->middleware('auth');
Route::post('/timeslots/{timeslot}/edit', 'TimeslotController@update')->name('timeslot.update')->middleware('auth');
Route::post('/timeslots/{timeslot}', 'TimeslotController@update')->name('timeslot.update')->middleware('auth');
Route::get('/timeslots/{timeslot}/delete', 'TimeslotController@destroy')->name('timeslot.delete')->middleware('auth');

//Doctor Fee Management
Route::get('/doctorfees', 'DoctorFeeController@index')->name('doctorfees')->middleware('auth');
Route::get('/doctorfees/create', 'DoctorFeeController@create')->name('doctorfee.create')->middleware('auth');
Route::post('/doctorfees/create', 'DoctorFeeController@store')->name('doctorfee.store')->middleware('auth');
Route::get('/doctorfees/{doctorFee}/edit', 'DoctorFeeController@edit')->name('doctorfee.edit')->middleware('auth');
Route::post('/doctorfees/{doctorFee}/edit', 'DoctorFeeController@update')->name('doctorfee.update')->middleware('auth');
Route::post('/doctorfees/{doctorFee}', 'DoctorFeeController@update')->name('doctorfee.update')->middleware('auth');
Route::get('/doctorfees/{doctorFee}/delete', 'DoctorFeeController@destroy')->name('doctorfee.delete')->middleware('auth');

//Doctor Schedule Management
Route::get('/doctorschedules', 'DoctorScheduleController@index')->name('doctorSchedules')->middleware('auth');
Route::get('/doctorschedules/create', 'DoctorScheduleController@create')->name('doctorSchedule.create')->middleware('auth');
Route::post('/doctorschedules/create', 'DoctorScheduleController@store')->name('doctorSchedule.store')->middleware('auth');
Route::get('/doctorschedules/{doctorSchedule}/edit', 'DoctorScheduleController@edit')->name('doctorSchedule.edit')->middleware('auth');
Route::post('/doctorschedules/{doctorSchedule}/edit', 'DoctorScheduleController@update')->name('doctorSchedule.update')->middleware('auth');
Route::post('/doctorschedules/{doctorSchedule}', 'DoctorScheduleController@update')->name('doctorSchedule.update')->middleware('auth');
Route::get('/doctorschedules/{doctorSchedule}/delete', 'DoctorScheduleController@destroy')->name('doctorSchedule.delete')->middleware('auth');

//Tests Management
Route::get('/tests', 'TestController@index')->name('tests')->middleware('auth');
Route::get('/tests/create', 'TestController@create')->name('test.create')->middleware('auth');
Route::post('/tests/create', 'TestController@store')->name('test.store')->middleware('auth');
Route::get('/tests/{test}/edit', 'TestController@edit')->name('test.edit')->middleware('auth');
Route::post('/tests/{test}/edit', 'TestController@update')->name('test.update')->middleware('auth');
Route::post('/tests/{test}', 'TestController@update')->name('test.update')->middleware('auth');
Route::get('/tests/{test}/delete', 'TestController@destroy')->name('test.delete')->middleware('auth');

//Patient Test Management
Route::get('/patienttests', 'PatientTestController@index')->name('patientTests')->middleware('auth');
Route::get('/patienttests/create', 'PatientTestController@create')->name('patientTest.create')->middleware('auth');
Route::post('/patienttests/create', 'PatientTestController@store')->name('patientTest.store')->middleware('auth');
Route::get('/patienttests/{patientTest}/view', 'PatientTestController@show')->name('patientTest.view')->middleware('auth');
Route::get('/patienttests/{patientTest}/edit', 'PatientTestController@edit')->name('patientTest.edit')->middleware('auth');
Route::post('/patienttests/{patientTest}/edit', 'PatientTestController@update')->name('patientTest.update')->middleware('auth');
Route::post('/patienttests/{patientTest}', 'PatientTestController@update')->name('patientTest.update')->middleware('auth');
Route::get('/patienttests/{patientTest}/delete', 'PatientTestController@destroy')->name('patientTest.delete')->middleware('auth');

//Patient Medicine Management
Route::get('/patientmedicines', 'PatientMedicineController@index')->name('patientMedicines')->middleware('auth');
Route::get('/patientmedicines/create', 'PatientMedicineController@create')->name('patientMedicine.create')->middleware('auth');
Route::post('/patientmedicines/create', 'PatientMedicineController@store')->name('patientMedicine.store')->middleware('auth');
Route::get('/patientmedicines/{patientMedicine}/view', 'PatientMedicineController@show')->name('patientMedicine.view')->middleware('auth');
Route::get('/patientmedicines/{patientMedicine}/edit', 'PatientMedicineController@edit')->name('patientMedicine.edit')->middleware('auth');
Route::post('/patientmedicines/{patientMedicine}/edit', 'PatientMedicineController@update')->name('patientMedicine.update')->middleware('auth');
Route::post('/patientmedicines/{patientMedicine}', 'PatientMedicineController@update')->name('patientMedicine.update')->middleware('auth');
Route::get('/patientmedicines/{patientMedicine}/delete', 'PatientMedicineController@destroy')->name('patientMedicine.delete')->middleware('auth');

//Prescription Management
Route::get('/prescriptions', 'PrescriptionController@index')->name('prescriptions')->middleware('auth');
Route::get('/prescriptions/create', 'PrescriptionController@create')->name('prescription.create')->middleware('auth');
Route::post('/prescriptions/create', 'PrescriptionController@store')->name('prescription.store')->middleware('auth');
Route::get('/prescriptions/{prescription}/view', 'PrescriptionController@show')->name('prescription.view')->middleware('auth');
Route::get('/prescriptions/{prescription}/edit', 'PrescriptionController@edit')->name('prescription.edit')->middleware('auth');
Route::post('/prescriptions/{prescription}/edit', 'PrescriptionController@update')->name('prescription.update')->middleware('auth');
Route::post('/prescriptions/{prescription}', 'PrescriptionController@update')->name('prescription.update')->middleware('auth');
Route::get('/prescriptions/{prescription}/delete', 'PrescriptionController@destroy')->name('prescription.delete')->middleware('auth');

//Tests Management
Route::get('/finance', 'FinanceController@index')->name('finance')->middleware('auth');
Route::get('/finance/appointments', 'FinanceController@appointments')->name('finance.appointments')->middleware('auth');
Route::get('/finance/fees', 'FinanceController@fees')->name('finance.fees')->middleware('auth');
Route::get('/finance/tests', 'FinanceController@tests')->name('finance.tests')->middleware('auth');
Route::get('/finance/medicines', 'FinanceController@medicines')->name('finance.medicines')->middleware('auth');

