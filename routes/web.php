<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\Admin\PrintCertificateController;
use App\Http\Controllers\Admin\CertificateSettingController;

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

Route::get('/', HomeController::class)->name('home');
Route::get('print/certificate/{certificate}', PrintCertificateController::class)->name('certificate.print');

Route::middleware(['auth', 'admin'])->group(function () {
   Route::get('/dashboard', DashboardController::class)->name('dashboard');
   Route::resource('/participant', ParticipantController::class)->except('show');
   Route::resource('/training', TrainingController::class)->except('show');
   Route::get('/certificate', CertificateController::class)->name('certificate.index');
   Route::get('/certificate/setting', [CertificateSettingController::class, 'edit'])->name('certificate.setting.edit');
   Route::post('/certificate/setting/{stamp}', [CertificateSettingController::class, 'update'])->name('certificate.setting.update');
});
require __DIR__ . '/auth.php';
