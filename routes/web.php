<?php

use App\Http\Controllers\admin\{AdminController, CategoryController, PostsController, SubCategoryController};
use App\Http\Controllers\auth\LoginRegisterController;
use App\Http\Controllers\HomeController;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Route;



Route::controller(HomeController::class)->group(function () {
    Route::get("/", "index")->name("Post");
    Route::get('/search/subcategories/{categoryId}', 'getSubcategories');
    Route::post('/post/store', 'store')->name('post.store');
    Route::get('/posts/{post}', [HomeController::class, 'show_details'])->name('post.details');
    Route::post('/posts/comments',  'store_comments')->middleware('auth')->name('comments.store');
});

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get("/login", "login")->name("login");
    Route::post("/login", "loginUs")->name("loginUs");
    Route::get("/register", "register")->name("register");
    Route::post("/register", "registerStore")->name("register.store");
    Route::get('/logout', 'logoutAndClearCache')->middleware('auth')->name('logout');
});
Route::prefix('admin')->middleware(['auth','CheckRole',])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/index', 'AdminIndex')->name('admin.index');
        Route::get('/profile', 'AdminProfile')->name('admin.profile');
        Route::post('/profile/update', 'AdminProfileUpdate')->name('admin.profile.update');
        Route::get('/users', 'Users')->name('admin.users');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category/add', 'index')->name('category.add');
        Route::post('/category/store', 'store')->name('category.store');
        Route::get('/category/show', 'show')->name('category.show');
    });
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/subcategory/add', 'index')->name('subcategory.add');
        Route::post('/subcategory/store', 'store')->name('subcategory.store');
        Route::get('/subcategories/show', 'show')->name('subcategory.show');
    });
    Route::controller(PostsController::class)->group(function () {
        Route::get('/post/add', 'index')->name('post.add');
        Route::post('/my-post/store', 'myPostStore')->name('mypost.store');
        Route::get('/post/show', 'show')->name('post.show');
        Route::get('/post/subcategories/{categoryId}', 'getSubcategories');
    });
});
