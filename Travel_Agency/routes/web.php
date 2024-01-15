<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/destination', [DestinationController::class, 'index'])->name('destination.index');


Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/destination/{destination:city}', [\App\Http\Controllers\DetailController::class, 'show'])->name('destination.show');

Route::get('/destination/detail', function () {
    return view('frontend.destination.detail');
})->name('destination.detail'); // Added a name for the destination detail route

Route::get('/destination', function () {
    return view('frontend.destination.index');
})->name('destination.index'); // Added a name for the destination index route

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');


Auth::routes();

Route::group(['middleware' => 'isAdmin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    // Uncomment if needed or remove if not
    // Route::get('destinations', [AdminDestinationController::class, 'index'])->name('destinations.index');
    // Route::resource('destinations', [AdminDestinationController::class,'index'])->name(['destinations.index']);

    Route::resource('sliders', SliderController::class);
    Route::resource('destinations', DestinationController::class);
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
    Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class);
});
