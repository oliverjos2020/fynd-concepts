<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\RoleManagement;
// use App\Http\Livewire\CategoryManagement;
use App\Http\Livewire\UserManagement;
// use App\Http\Livewire\Index;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\RegisterClient;
// use App\Http\Livewire\ClientManagement;
// use App\Http\Livewire\SingleClient;
// use App\Http\Livewire\EditClient;
use App\Http\Controllers\UserAPIController;

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


Route::middleware(['auth', 'checkStatus'])->group(function () {
    Route::get('/dashboard2', Dashboard::class)->name('dashboard2');
});

Route::middleware(['auth'])->group(function () {
    // Route::get('/generate-pdf/{clientID}', [PDFController::class, 'generatePDF']);
    Route::get('/role', RoleManagement::class)->name('role');
    // Route::get('/edit/{clientID}', EditClient::class)->name('editClient');
    // Route::get('/category', CategoryManagement::class)->name('category');
    Route::get('/register-client', RegisterClient::class)->name('registerClient');
    // Route::get('/client-management/{type}', ClientManagement::class)->name('clientManagement');
    // Route::get('/client/{clientID}', SingleClient::class)->name('singleClient');
    Route::middleware('can:admin-only')->group(function () {
        Route::get('/users', UserManagement::class)->name('userSetup');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('api')->group(function () {
    Route::post('/api/v1/register', [UserAPIController::class, 'register']);
    Route::post('/api/v1/registerUser', [UserAPIController::class, 'registerUser']);
    Route::post('/api/v1/login', [UserAPIController::class, 'login']);
    Route::post('/api/v1/confirmOTP', [UserAPIController::class, 'confirmOtp']);
});

require __DIR__.'/auth.php';
