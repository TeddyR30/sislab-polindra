<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PeminjamanController;

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
    return view('auth.login');
});

Route::middleware(['splade'])->group(function () {
    // Route::get('/', fn () => view('home'))->name('home');
    Route::get('/docs', fn () => view('docs'))->name('docs');

    Route::resource('/barang', BarangController::class);

    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index']);
    Route::post('/login', [AuthController::class, 'process'])->name('process');
    Route::resource('/register', RegisterController::class);
});

Route::middleware('auth')->group(function(){
    Route::get('mahasiswa/dashboard', [AppController::class, 'mahasiswa']);
    Route::get('admin/dashboard', [AppController::class, 'admin']);
    Route::get('superadmin/dashboard', [AppController::class, 'superadmin']);

});

Route::get('/logout', [AuthController::class ,'logout']);

Route::get('profile/profile', [UserController::class, 'profile']);

Route::get('peminjaman/index', [PeminjamanController::class, 'index']);

Route::resource('products', ProductController::class);
// Route::get('send-notif/{name}', function ($name) {
//     event(new AppEventsSendGlobalNotification($name));
//     return "Event has been sent!";
// });
