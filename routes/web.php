<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\imtController;
use App\Http\Controllers\CertificateController;
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
    return view('welcome');
});

Route::get('pdf', [PdfController::class, 'index']);  //pdf with html render
Route::get('pdf1', [PdfController::class, 'custom']); //pdf generate in controller
Route::get('read-excel',[ExcelController::class,'index']); //excel-to-pdf
Route::get('certificate',[CertificateController::class,'index']); //certificate
Route::get('imt',[imtController::class,'index']); //Intifacc Mordern Technology


//excels
Route::get('/file-import',[UserController::class,
            'importView'])->name('import-view');
    Route::post('/import',[UserController::class,
            'import'])->name('import');
    Route::get('/export-users',[UserController::class,
            'exportUsers'])->name('export');
