<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\Index;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\LGAManagement;
use App\Http\Livewire\RegisterClient;
use App\Http\Livewire\RoleManagement;
use App\Http\Livewire\UserManagement;
use Illuminate\Support\Facades\Route;
// use App\Http\Livewire\ClientManagement;
// use App\Http\Livewire\SingleClient;
// use App\Http\Livewire\EditClient;
use App\Http\Livewire\StateManagement;
use App\Http\Livewire\ServiceManagement;
use App\Http\Livewire\UserAuthentication;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserAPIController;
use App\Http\Livewire\SubServiceManagement;
use App\Http\Livewire\SingleArtisan;
use App\Http\Livewire\Listing;

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


Route::get('/', Index::class)->name('index');
Route::get('/authenticate', UserAuthentication::class)->name('authenticate');
Route::get('/artisan/{artisanID}', SingleArtisan::class)->name('singleartisan');
Route::get('/listing', Listing::class)->name('listing');

Route::middleware(['auth', 'checkStatus'])->group(function () {
    Route::get('/dashboard2', Dashboard::class)->name('dashboard2');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', Home::class)->name('home');
    Route::get('/role', RoleManagement::class)->name('role');
    Route::get('/service', ServiceManagement::class)->name('service');
    Route::get('/state', StateManagement::class)->name('state');
    Route::get('/lga', LGAManagement::class)->name('lga');
    Route::get('/subservice', SubServiceManagement::class)->name('subservice');
    Route::get('/register-client', RegisterClient::class)->name('registerClient');
    Route::middleware('can:admin-only')->group(function () {
        Route::get('/users', UserManagement::class)->name('userSetup');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('api')->group(function () {
    Route::get('/api/v1/refresh', [UserAPIController::class, 'refresh']);
    Route::post('/api/v1/logout', [UserAPIController::class, 'logout']);
    Route::post('/api/v1/register', [UserAPIController::class, 'register']);
    Route::post('/api/v1/updateUser', [UserAPIController::class, 'updateUser']);
    Route::post('/api/v1/login', [UserAPIController::class, 'login']);
    Route::post('/api/v1/confirmOTP', [UserAPIController::class, 'confirmOtp']);
    Route::group(['middleware' => ['auth.jwt']], function() {
        Route::get('/api/v1/services', [ServiceController::class, 'services']);
        Route::get('/api/v1/artisans', [ArtisanController::class, 'artisans']);
    });
});

require __DIR__.'/auth.php';
