<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\LockScreen;


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

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();

// ----------------------------- home dashboard ------------------------------//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// -----------------------------login----------------------------------------//
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// ----------------------------- lock screen --------------------------------//
Route::get('lock_screen', [App\Http\Controllers\LockScreen::class, 'lockScreen'])->middleware('auth')->name('lock_screen');
Route::post('unlock', [App\Http\Controllers\LockScreen::class, 'unlock'])->name('unlock');

// ------------------------------ register ---------------------------------//
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'storeUser'])->name('register');

// ----------------------------- forget password ----------------------------//
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postEmail'])->name('forget-password');

// ----------------------------- reset password -----------------------------//
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword']);

// ----------------------------- user profile ------------------------------//
Route::get('profile_user', [App\Http\Controllers\UserManagementController::class, 'profile'])->name('profile_user');
Route::post('profile_user/store', [App\Http\Controllers\UserManagementController::class, 'profileStore'])->name('profile_user/store');

// ----------------------------- user userManagement -----------------------//
Route::get('userManagement', [App\Http\Controllers\UserManagementController::class, 'index'])->middleware('auth')->name('userManagement');
Route::get('user/add/new', [App\Http\Controllers\UserManagementController::class, 'addNewUser'])->middleware('auth')->name('user/add/new');
Route::post('user/add/save', [App\Http\Controllers\UserManagementController::class, 'addNewUserSave'])->name('user/add/save');
Route::get('view/detail/{id}', [App\Http\Controllers\UserManagementController::class, 'viewDetail'])->middleware('auth');
Route::post('update', [App\Http\Controllers\UserManagementController::class, 'update'])->name('update');
Route::get('delete_user/{id}', [App\Http\Controllers\UserManagementController::class, 'delete'])->middleware('auth');
Route::get('activity/log', [App\Http\Controllers\UserManagementController::class, 'activityLog'])->middleware('auth')->name('activity/log');
Route::get('activity/login/logout', [App\Http\Controllers\UserManagementController::class, 'activityLogInLogOut'])->middleware('auth')->name('activity/login/logout');

Route::get('change/password', [App\Http\Controllers\UserManagementController::class, 'changePasswordView'])->middleware('auth')->name('change/password');
Route::post('change/password/db', [App\Http\Controllers\UserManagementController::class, 'changePasswordDB'])->name('change/password/db');

// ----------------------------- form staff ------------------------------//
Route::get('form/staff/new', [App\Http\Controllers\FormController::class, 'index'])->middleware('auth')->name('form/staff/new');
Route::post('form/save', [App\Http\Controllers\FormController::class, 'saveRecord'])->name('form/save');
Route::get('form/view/detail/{id}', [App\Http\Controllers\FormController::class, 'viewDetail'])->middleware('auth');
Route::post('form/view/update', [App\Http\Controllers\FormController::class, 'viewUpdate'])->name('form/view/update');
Route::get('delete/{id}', [App\Http\Controllers\FormController::class, 'viewDelete'])->middleware('auth');
Route::get('form/view/detail', [App\Http\Controllers\FormController::class, 'viewRecord'])->middleware('auth')->name('form/view/detail');


// ----------------------------- products management ------------------------------//
Route::get('form/view/products', [App\Http\Controllers\FormController::class, 'viewProducts'])->middleware('auth')->name('form/view/products');
Route::get('form/view/featured/products', [App\Http\Controllers\FormController::class, 'viewFeaturedProducts'])->middleware('auth')->name('form/view/featured/products');

// ----------------------------- store management ------------------------------//
Route::get('form/view/store', [App\Http\Controllers\StoreController::class, 'viewStores'])->middleware('auth')->name('form/view/store');
Route::get('form/view/featured/store', [App\Http\Controllers\StoreController::class, 'viewFeaturedStores'])->middleware('auth')->name('form/view/featured/store');
Route::get('form/view/store/create', [App\Http\Controllers\StoreController::class, 'create'])->middleware('auth')->name('form/view/store/create');
Route::post('form/view/store/store', [App\Http\Controllers\StoreController::class, 'store'])->middleware('auth')->name('form/view/store/store');

// ----------------------------- categories management ------------------------------//
Route::get('form/view/categories', [App\Http\Controllers\CategoryController::class, 'index'])->middleware('auth')->name('form/view/categories');
Route::get('form/view/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->middleware('auth')->name('form/view/category/delete/{id}');
Route::get('form/view/category/show/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->middleware('auth')->name('form/view/category/show/{id}');
Route::post('form/view/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->middleware('auth')->name('form/view/category/store');
Route::put('form/view/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->middleware('auth')->name('form/view/category/update/{id}');
Route::get('form/view/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->middleware('auth')->name('form/view/category/create');


// ----------------------------- orders management ------------------------------//
Route::get('form/view/orders', [App\Http\Controllers\FormController::class, 'viewOrders'])->middleware('auth')->name('form/view/orders');


// ----------------------------- messages management ------------------------------//
Route::get('form/view/message/new', [App\Http\Controllers\FormController::class, 'sendNewMassage'])->middleware('auth')->name('form/view/message/new');
Route::get('form/view/message', [App\Http\Controllers\FormController::class, 'viewMessages'])->middleware('auth')->name('form/view/message');


// ----------------------------- profile management ------------------------------//
Route::get('form/view/profile/{id}', [App\Http\Controllers\FormController::class, 'viewProfile'])->middleware('auth')->name('form/view/profile');

