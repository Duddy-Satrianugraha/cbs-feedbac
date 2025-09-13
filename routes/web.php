<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileContoller;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\OfeedbackController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\PowerController;

use App\Http\Middleware\Panitia;

use App\Http\Middleware\Mahasiswa;


Route::get('/', function () {
    return view('auth.login');
});


Route::get('/dashbord', [DashbordController::class, 'index'])->middleware(['auth', ])->name('dashbord');
Route::get('/admin/power/destroy',[PowerController::class, 'destroy'])->name('admin.powerdown');
Route::post('/profile/photo', [ProfileContoller::class, "updatePhoto"])->middleware('auth')->name('profile.photo.update');
Route::resource('/profile', ProfileContoller::class)->middleware(['auth']);

Route::prefix('admin')->middleware(['auth', Panitia::class ])->name('admin.')->group( function (){
    Route::resource('/users', AdminController::class);
    Route::get('/power/{id}', [PowerController::class, 'index'])->name('powerup');
    Route::resource('/options', OptionController::class);
});


Route::prefix('mahasiswa')->middleware(Mahasiswa::class)->name('mahasiswa.')->group( function (){
    Route::get('/nametag/cetak', [PdfController::class, 'mhs'])->name('nametag.cetak');
    Route::resource('/feedback', OfeedbackController::class);
});

Route::get('/x/{token}/{filename}', [ProfileContoller::class, 'showpub'])->name('data.file');

