<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CustomerController; 
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\CustomerAppointmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ManagerProfileController;
use App\Http\Controllers\StaffProfileController;
use App\Http\Controllers\ManageStaffController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClientRecordController;
use App\Http\Controllers\SalesController;

// Public routes
Route::get('/', function () {
    return view('welcome');
});
Route::get('/all-packages', function () {
    return view('allpackages');
})->name('all.packages');

// Registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Forgot Password routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showResetForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'reset'])->name('password.update');

// Dashboard routes

Route::get('/customer/dashboard', [DashboardController::class, 'index'])->name('customer.dashboard');
Route::get('/staff/dashboard', [DashboardController::class, 'Index'])->name('staff.dashboard');
Route::get('/manager/dashboard', [DashboardController::class, 'Index'])->name('manager.dashboard');

// Customer Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/customer/profile', [ProfileController::class, 'edit'])->name('customer.profile');
    Route::put('/customer/profile', [ProfileController::class, 'update'])->name('customer.profile.update');
});
Route::prefix('customer/appointment')->group(function () {
    Route::get('/', [CustomerAppointmentController::class, 'index'])->name('customer.appointment.index');
    Route::get('/book/{id}', [CustomerAppointmentController::class, 'book'])->name('customer.appointment.book');
    Route::get('/showBookingForm/{id}', [CustomerAppointmentController::class, 'showBookingForm'])->name('customer.appointment.showBookingForm'); // FIXED
    Route::post('/confirm', [CustomerAppointmentController::class, 'confirmBooking'])->name('customer.appointment.confirm');
});

Route::prefix('customer')->middleware('auth')->group(function () {
    Route::get('/payment', [PaymentController::class, 'index'])->name('customer.payment');
    Route::get('/payment/{id}', [PaymentController::class, 'show'])->name('customer.payment.show');
});
Route::delete('/payment/cancel/{id}', [PaymentController::class, 'cancelPayment'])
    ->name('customer.payment.cancel');
    Route::post('/customer/payment/{id}/upload', [PaymentController::class, 'uploadReceipt'])->name('customer.payment.upload');
Route::get('/customer/dashboard', [DashboardController::class, 'index'])->name('customer.dashboard');
Route::post('/consultation', [ConsultationController::class, 'storeConsultation'])->name('customer.consultation.store');
Route::get('/consultation', [ConsultationController::class, 'consultation'])->name('customer.consultation');






// staff Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/staff/profile', [StaffProfileController::class, 'edit'])->name('staff.profile');
    Route::put('/staff/profile', [StaffController::class, 'update'])->name('staff.profile.update');
});
 Route::put('/customer/profile', [ProfileController::class, 'update'])->name('customer.profile.update');
Route::get('/staff/appointments', [StaffController::class, 'appointments'])->name('staff.appointment');
Route::get('/staff/client-records', [StaffController::class, 'clientRecords'])->name('staff.clientrecord');
Route::get('/staff/track-sales', [StaffController::class, 'trackSales'])->name('staff.sales');





//manager routes
Route::middleware(['auth'])->group(function () {
    Route::get('/manager/profile', [ManagerProfileController::class, 'edit'])->name('manager.profile');
    Route::put('/manager/profile', [ManagerProfileController::class, 'update'])->name('manager.profile.update');
});

Route::resource('manager/staff', ManageStaffController::class);
Route::resource('manager/packages', PackageController::class);
Route::get('/manager/appointment', [ManagerController::class, 'manageAppointment'])->name('manager.appointment');
Route::get('/manager/reports', [ManagerController::class, 'viewReports'])->name('manager.sales');

Route::get('/manager/clientrecord', [ManagerController::class, 'clientrecord'])->name('manager.clientrecord');


// Appointment Management

Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointment.index');
Route::get('/appointment/{id}/consultation', [AppointmentController::class, 'showConsultation'])->name('appointment.consultation');
Route::get('/appointments/{id}/consultation', [AppointmentController::class, 'showConsultation'])->name('appointment.consultation');


//client Record

Route::get('/record', [ClientRecordController::class, 'index'])->name('record.index');
Route::get('/client-records/{clientId}/history', [ClientRecordController::class, 'showHistory'])->name('client.history');

// Sales 
Route::get('/sales/dashboard', [SalesController::class, 'dashboard'])->name('sales.dashboard');
Route::get('/sales/report', [SalesController::class, 'showReport'])->name('sales.report');
Route::get('/sales/report/pdf', [SalesController::class, 'downloadReportAsPDF'])->name('sales.report.pdf');
// Logout Route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

