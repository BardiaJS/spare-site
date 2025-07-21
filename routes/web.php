<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', [UserController::class,  'showCorrectHomePage'])->name('login');
Route::post('/register', [ UserController::class , 'register']);
Route::post('/login', [ UserController::class ,'login']);
Route::post('/logout' , [UserController::class, 'logout'])->middleware('auth');
Route::get('/complete-profile-user/{user}' , [UserController::class, 'show_complete_profile_form'])->middleware('auth');
Route::post('/complete-profile-user/{user}' , [UserController::class, 'complete_profile'])->middleware('auth');



Route::get('/become-admin/{user}' , [AdminController::class, 'become_admin_form'])->middleware('auth');
Route::post('/become-admin/{user}' , [AdminController::class, 'become_admin'])->middleware('auth');

Route::get('/add-product' , [ProductController::class , 'show_product_sale_form'])->middleware('auth');
Route::post('/add-product' , [ProductController::class , 'put_product_for_sale'])->middleware('auth');

Route::get('/add-category' , [CategoryController::class , 'show_category_form'])->middleware('auth');
Route::post('/add-category' , [CategoryController::class ,'add_category'])->middleware('auth');

Route::get('/add-brand' , [BrandController::class , 'add_brand_form'])->middleware('auth');
Route::post('/add-brand' , [BrandController::class ,'add_brand'])->middleware('auth');

Route::get('/single-profile/user/{user}' , [UserController::class, 'user_single_profile'])->middleware('auth');
Route::get('/user-information/user/{user}' , [UserController::class , 'user_information_form'])->middleware('auth');
Route::put('/user-information/user/{user}' , [UserController::class , 'change_user_information'])->middleware('auth');
Route::get('/user-password/user/{user}' , [UserController::class, 'user_password_form'])->middleware('auth');
Route::put('/user-password/user/{user}' , [UserController::class, 'change_user_password'])->middleware('auth');

Route::get('/admin-information/admin/{admin}' , [AdminController::class, 'admin_information_form'])->middleware('auth');
Route::put('/admin-information/admin/{admin}' , [AdminController::class, 'change_admin_information'])->middleware('auth');

Route::get('/avatar-form' , [UserController::class,'show_avatar_form'])->middleware('auth');
Route::post('/set-profile/user/{user}' , [UserController::class, 'set_profile_user'])->middleware('auth');

Route::post('/set-image-for-product-frorm/{product}' , [ProductController::class, 'set_product_image'])->middleware('auth');
Route::get('/all-productions' , [ProductController::class,'get_all_productions'])->middleware('auth');

Route::get('/single-product/product/{product}' , [ProductController::class, 'show_single_product'])->middleware('auth');

Route::get('/show-all-comments/product/{product}' , [ProductController::class,'show_all_comments_of_product'])->middleware('auth');
Route::post('/add-to-order/product/{product}' , [OrderController::class,'add_product_to_order'])->middleware('auth');
Route::delete('/delete-from-order/order/{order}' , [OrderController::class, 'delete_from_order' ])->middleware('auth');

Route::get('/comment-form/{product}' , [CommentController::class,'show_comment_form'])->middleware('auth');
Route::post('/add-comment/product/{product}' , [CommentController::class, 'add_comment'])->middleware('auth');

Route::delete('/delete-comment/comment/{comment}' , [CommentController::class,'delete_comment'])->middleware('auth');
Route::get('/edit-comment/form/{comment}' , [CommentController::class,'edit_comment_form'])->middleware('auth');
Route::put('/edit-comment/comment/{comment}' , [CommentController::class,'edit_comment'])->middleware('auth');
Route::post('/ban-user/user/{user}' , [AdminController::class,'ban_user'])->middleware('auth');
Route::delete('/unban-user/user/{user}' , [AdminController::class, 'unban_user'])->middleware('auth');
Route::get('/ban-list' , [AdminController::class, 'ban_list'])->middleware('auth');
Route::get('/search' , function(){
    return view('search-bar-form');
} )->middleware('auth');
Route::get('/search-user-input/result' , [UserController::class, 'search_by_user_input'])->middleware('auth');
Route::get('/search-brand/{brandName}/result' , [UserController::class, 'search_by_brand'])->middleware('auth');
Route::get('/search-category/{brandName}/result' , [UserController::class, 'search_by_category'])->middleware('auth');
Route::get('/shopping-cart' , [ProductController::class, 'show_shopping_cart'])->middleware('auth');