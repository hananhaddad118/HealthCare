<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ApoientmentController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReplayController;


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

Route::get('/', function () {
    return view('layouts.site2');
});

Auth::routes();
Route::middleware(['auth', 'user-access:doctor'])->group(function () {

    Route::get('/doctor', [HomeController::class, 'doctorHome'])->name('doctor.home');
    Route::get('/doctor_patient', [HomeController::class, 'doctorHomee'])->name('doctor.patient');
    Route::post('/user/update/{id}', [OrderController::class, 'update'])->name('user.update_user');
    Route::get('doctor_replay', [ReplayController::class, 'dctor_replays'])->name('replay.doctor');
    Route::get('doctor_app', [ApoientmentController::class, 'doctor_app'])->name('doctor.app');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::post('/user/update/{id}', [OrderController::class, 'update'])->name('user.update_user');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:patient'])->group(function () {

    Route::get('/patient/home', [HomeController::class, 'patienHome'])->name('patient.home');
    Route::post('/user/update/{id}', [OrderController::class, 'update'])->name('user.update_user');
    Route::get('patient_replay', [ReplayController::class, 'patient_replays'])->name('replay.patient');
    Route::get('patient_app', [ApoientmentController::class, 'patient_app'])->name('patient.app');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('order', OrderController::class);
// Route::resource('user', UserController::class);
Route::resource('appoientment', ApoientmentController::class);
Route::resource('replay', ReplayController::class);

Route::post('/accept_user', [OrderController::class, 'accept_user'])->name('order.accept_user');
Route::get('/accept_order', [OrderController::class, 'accept_order'])->name('order.accept_order');
Route::get('/users', [OrderController::class, 'users'])->name('order.user');
Route::post('/user/update/{id}', [OrderController::class, 'update'])->name('user.update_user');

Route::get('/test', function () {
    return view('layouts.site');
});
