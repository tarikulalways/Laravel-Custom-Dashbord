<?php

use App\Http\Controllers\user\UserController;
use App\Http\Controllers\bakend\AuthController;
use App\Http\Controllers\bakend\BrandController;
use App\Http\Controllers\frontent\HomeController;
use App\Http\Controllers\bakend\CategoryController;
use App\Http\Controllers\users\UserProfileController;
use App\Http\Controllers\bakend\SubCategoryController;

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
//=================================== frontend page system

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('home');
});


//========================== dahsbord system

// admin login informations
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginPost')->name('loginPost');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(AuthController::class)->prefix('/admin')->group(function () {
        Route::get('/dashbord', 'dahsbord')->name('dashbord');
        Route::get('/login', 'logout')->name('logout');
    });
});

// category function
Route::middleware(['auth'])->group(function () {
    Route::controller(CategoryController::class)->prefix('/admin')->group(function(){
        Route::get('/category-add', 'create')->name('category.create');
        Route::post('/category-store', 'store')->name('category.store');
        Route::get('/category-index', 'index')->name('category.index');
        Route::get('/category-edit/{category}', 'edit')->name('category.edit');
        Route::post('/category-update/{category}', 'update')->name('category.update');
        Route::get('/category-destroy/{category}', 'destroy')->name('category.destroy');
    });
});

// sub category function
Route::middleware(['auth'])->group(function () {
    Route::controller(SubCategoryController::class)->prefix('/admin')->group(function(){
        Route::get('/sub-category', 'create')->name('subCategory.create');
        Route::get('/all-sub-category', 'index')->name('subCategory.index');
        Route::post('/sub-category-store', 'store')->name('subCartegory.store');
        Route::get('/sub-category-edit/{subCategory}', 'edit')->name('subCategory.edit');
        Route::post('/sub-category-update/{subCategory}', 'update')->name('subCategory.update');
        Route::get('/sub-category-destroy/{subCategory}', 'destroy')->name('subcategory.destroy');
    });
});

// Brand function
Route::middleware(['auth'])->group(function () {
    Route::controller(BrandController::class)->prefix('/admin')->group(function(){
        Route::get('/brand-create', 'create')->name('brand.create');
        Route::get('/brand-index', 'index')->name('brand.index');
        Route::post('/brand-store', 'store')->name('brand.store');
        Route::get('/brand-edit/{brand}', 'edit')->name('brand.edit');
        Route::post('/brand-update/{brand}', 'update')->name('brand.update');
        Route::get('/brand-destroy/{brand}', 'destroy')->name('brand.destory');
    });
});

// ==========================================

// user login informations
Route::controller(AuthController::class)->prefix('/user')->group(function(){
    Route::get('/registration', 'registration')->name('registration');
    Route::post('/register', 'registerPost')->name('registerPost');
    Route::get('/login', 'userLogin')->name('userLogin');
    Route::post('/login', 'userloginPost')->name('userloginPost');
});

// user authonticat
Route::middleware(['auth'])->group(function () {
    Route::controller(AuthController::class)->prefix('/user')->group(function () {
        Route::get('/profile', 'profile')->name('profile');
        Route::get('/logout', 'userLogout')->name('userLogout');
    });
});

// ====================
// users controlink

Route::middleware(['auth'])->group(function () {
    Route::controller(UserController::class)->prefix('/user')->group(function(){
        Route::get('/user-profile', 'create')->name('profile.create');
        Route::get('/profile-edit/{id}', 'edit')->name('profile.edit');
        Route::post('/profile-update/{id}', 'update')->name('profile.update');
    });
});

// user photo change

Route::middleware(['auth'])->group(function () {
    Route::controller(UserController::class)->prefix('/user')->group(function(){
        Route::get('/profile-img', 'show')->name('profileImgShow.store');
        Route::post('/profile-img-store', 'store')->name('profileImg.store');
    });
});
