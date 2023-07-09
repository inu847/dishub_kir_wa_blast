<?php

use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\KirController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WhatsappSennderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
    return redirect()->route('login');
});


Route::get('/cronjob', function () {
    Artisan::call('schedule:run');
    return "Schedule Run Successfully";
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('kir/reminder-whatsapp', [WhatsappSennderController::class, 'send']);
    Route::post('kir/reminder-whatsapp/{id}', [WhatsappSennderController::class, 'wApiSender'])->name('send.again');

    Route::get('general-setting', [GeneralSettingController::class, 'index'])->name('general-setting.index');
    Route::get('dahsboard', [KirController::class, 'history'])->name('dahsboard');
    Route::post('general-setting/{id}', [GeneralSettingController::class, 'update'])->name('general-setting.update');
    Route::resource('kir', KirController::class);
    Route::resource('user', UserController::class);
});