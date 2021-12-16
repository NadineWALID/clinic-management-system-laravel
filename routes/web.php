<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
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

Route::get('/', [HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/doctor', [DoctorController::class,'homedoctor']);
Route::get('/view_patients', [DoctorController::class,'addview']);
Route::get('/addprescription', [DoctorController::class,'addprescription']);
Route::get('/add_doctor_view', [AdminController::class,'addview']);
Route::post('/upload_doctor', [AdminController::class,'upload']);
Route::post('/appointment', [HomeController::class,'appointment']);
Route::get('/myappointment', [HomeController::class,'myappointment']);
Route::get('/cancel_appoint/{id}', [HomeController::class,'cancel_appoint']);
Route::get('/showappointments', [AdminController::class,'showappointments']);
Route::get('/approved/{id}', [AdminController::class,'approved']);
Route::get('/canceled/{id}', [AdminController::class,'canceled']);
Route::get('/showdoctors', [AdminController::class,'showdoctors']);
Route::get('/delete_app/{id}', [AdminController::class,'delete_app']);
Route::get('/deletedoctor/{id}', [AdminController::class,'deletedoctor']);
Route::get('/updatedoctor/{id}', [AdminController::class,'updatedoctor']);
Route::post('/editdoctor/{id}', [AdminController::class,'editdoctor']);