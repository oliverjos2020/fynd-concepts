<?php

use App\Http\Livewire\FAQ;
use App\Http\Livewire\Home;
use App\Http\Livewire\About;
use App\Http\Livewire\Index;
use App\Http\Livewire\MyContact;
use App\Http\Livewire\Listing;
use App\Http\Livewire\MyFavorite;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ReportManagement;
// use App\Http\Livewire\ClientManagement;
// use App\Http\Livewire\SingleClient;
// use App\Http\Livewire\EditClient;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Artisans;
use App\Http\Livewire\MyProfile;
use App\Http\Livewire\LGAManagement;
use App\Http\Livewire\SingleArtisan;
use App\Http\Livewire\RegisterClient;
use App\Http\Livewire\RoleManagement;
use App\Http\Livewire\UserManagement;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\StateManagement;
use App\Http\Livewire\ServiceManagement;
use App\Http\Livewire\UserAuthentication;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserAPIController;
use App\Http\Livewire\SubServiceManagement;
use App\Http\Controllers\FileUploadAPIController;
use App\Http\Controllers\FavoriteAPIController;
use App\Http\Controllers\ReportArtisanController;


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
Route::get('/about', About::class)->name('about');
Route::get('/faq', FAQ::class)->name('faq');
Route::get('/contact', MyContact::class)->name('contact');
// Route::get('/about', function(){
//     return view('livewire.home.about')->layout('components.home.home-master');
// });
Route::get('/authenticate', UserAuthentication::class)->name('authenticate');
Route::get('/artisan/{artisanID}', SingleArtisan::class)->name('singleartisan');
Route::get('/listing', Listing::class)->name('listing');
Route::get('/link', function(){
    try{
        Artisan::call('storage:link');
         echo "linked successfully!";
    } catch (Exception $e) {
        echo "An error occurred: " . $e->getMessage();
    }
});
Route::get('/unlink', function () {
    try {
        $link = public_path('storage');  // Path to the symbolic link
        if (file_exists($link)) {
            unlink($link);  // Remove the symbolic link
            echo "Symbolic link unlinked successfully!";
        } else {
            echo "Symbolic link does not exist.";
        }
    } catch (Exception $e) {
        echo "An error occurred: " . $e->getMessage();
    }
});

Route::get('/clear/cache', function () {

    try {
        // Clear various caches
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');

        echo "Caches cleared successfully!";
    } catch (Exception $e) {
        echo "An error occurred: " . $e->getMessage();
    }
});

Route::middleware(['auth', 'checkStatus'])->group(function () {
    Route::get('/dashboard2', Dashboard::class)->name('dashboard2');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', Home::class)->name('home');
    Route::get('/profile', MyProfile::class)->name('profile');
    Route::get('/role', RoleManagement::class)->name('role');
    Route::get('/service', ServiceManagement::class)->name('service');
    Route::get('/state', StateManagement::class)->name('state');
    Route::get('/lga', LGAManagement::class)->name('lga');
    Route::get('/subservice', SubServiceManagement::class)->name('subservice');
    Route::get('/register-client', RegisterClient::class)->name('registerClient');
    Route::get('/favorite', MyFavorite::class)->name('favorite');
    Route::middleware('can:admin-only')->group(function () {
        Route::get('/users', UserManagement::class)->name('userSetup');
        Route::get('/profile/{userID}', Profile::class)->name('userProfile');
        Route::get('/user-artisans', Artisans::class)->name('artisans');
        Route::get('/reports', ReportManagement::class)->name('reports');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('api')->group(function () {
    Route::get('/api/v1/refresh', [UserAPIController::class, 'refresh']);
    Route::post('/api/v1/logout', [UserAPIController::class, 'logout']);
    Route::post('/api/v1/registerUser', [UserAPIController::class, 'registerUser']);

    Route::post('/api/v1/login', [UserAPIController::class, 'login']);
    Route::post('/api/v1/confirmOTP', [UserAPIController::class, 'confirmOtp']);
    Route::post('/api/v1/forgot-password', [UserAPIController::class, 'forgotPassword']);
    Route::group(['middleware' => ['auth.jwt']], function() {
        Route::get('/api/v1/services', [ServiceController::class, 'services']);
        Route::get('/api/v1/artisans', [ArtisanController::class, 'artisans']);
        Route::get('/api/v1/states', [ArtisanController::class, 'allState']);
        Route::post('/api/v1/lgas', [ArtisanController::class, 'AllLGA']);
        Route::post('/api/v1/updateProfile', [ArtisanController::class, 'updateProfile']);
        Route::post('/api/v1/getUser', [UserAPIController::class, 'getUser']);
        Route::post('/api/v1/upload-files', [FileUploadAPIController::class, 'uploadFiles']);
        Route::post('/api/v1/review-rating', [ReviewController::class, 'create']);
        Route::post('/api/v1/workImages', [FileUploadAPIController::class, 'workImages']);
        Route::post('/api/v1/add-favorite', [FavoriteAPIController::class, 'create']);
        Route::post('/api/v1/remove-favorite', [FavoriteAPIController::class, 'remove']);
        Route::post('/api/v1/my-favorite', [FavoriteAPIController::class, 'myFavorites']);
        
        Route::post('/api/v1/report', [ReportArtisanController::class, 'create']);
    });
});

require __DIR__.'/auth.php';
