<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;


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


// -----------> Admin Route <--------------//



    // Auth
// Route::get('/login', [AdminController::class, 'Index'])->name('login_form');
Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');
Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
Route::get('/redirect-notification-page/{notification_id}', [AdminController::class, 'redirectNotificationRoute'])->name('redirect-to-notification-route')->middleware('admin');
Route::get('/logout', [AdminController::class, 'Logout'])->name('admin.logout')->middleware('admin');
// Route::get('/register', [AdminController::class, 'Register'])->name('admin.register');
// Route::post('/register/create', [AdminController::class, 'Create'])->name('admin.register.create');

// Admin Profile
Route::get('/profile', [AdminProfileController::class, 'Profile'])->name('admin.profile');
Route::get('/profile/edit', [AdminProfileController::class, 'EditProfile'])->name('admin.profile.edit');
Route::post('/profile/store', [AdminProfileController::class, 'Store'])->name('admin.profile.store');
Route::get('/profile/change-password', [AdminProfileController::class, 'ChangePassword'])->name('admin.profile.change_password');
Route::post('/profile/change-update', [AdminProfileController::class, 'UpdatePassword'])->name('admin.profile.update_password');




// Admin Settings requests Routes
Route::prefix('manage-user')->group(function(){

    Route::get('/all', [UserController::class, 'allUser'])->name('user.all');
  
    Route::get('/details/{id}', [UserController::class, 'userDetails'])->name('user.details');
    Route::get('/create', [UserController::class, 'createUser'])->name('user.create');
    Route::post('/store', [UserController::class, 'storeUser'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
    Route::post('/update', [UserController::class, 'updateUser'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');
    Route::get('/deleted/all', [UserController::class, 'deletedUsers'])->name('user.deleted.all');
    Route::get('/deleted/restore/{id}', [UserController::class, 'restoreDeletedUser'])->name('user.deleted.restore');
    // Route::get('/delete/permanent/{id}', [UserController::class, 'deleteUserPermanently'])->name('user.delete.permanent');
    Route::get('/password/reset/view', [UserController::class, 'resetUserPasswordView'])->name('user.password.reset.view');
    Route::get('/password/reset/{id}', [UserController::class, 'resetUserPassword'])->name('user.password.reset');
    Route::post('/password/update', [UserController::class, 'updateUserPassword'])->name('user.password.update');
  
    
});







// -----------> Seller Route End <--------------//


Route::get('/', [AdminController::class, 'Index'])->name('login_form');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::fallback(function () {

    return view("404");

});

require __DIR__.'/auth.php';


// Route::get('/cache', function () {
//     Artisan::call('cache:clear');
// });

// Route::get('/config', function () {
//     Artisan::call('config:clear');

// });


// Route::get('/storage', function () {
//     Artisan::call('storage:link');
// });
