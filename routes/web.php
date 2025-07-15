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


Route::get('/', [UserController::class,  'showCorrectHomePage']);
Route::post('/register', [ UserController::class , 'register']);
Route::post('/login', [ UserController::class ,'login']);
Route::post('/logout' , [UserController::class, 'logout']);
Route::get('/complete-profile-user/{user}' , [UserController::class, 'show_complete_profile_form']);
Route::post('/complete-profile-user/{user}' , [UserController::class, 'complete_profile']);



Route::get('/become-admin/{user}' , [AdminController::class, 'become_admin_form']);
Route::post('/become-admin/{user}' , [AdminController::class, 'become_admin']);

Route::get('/add-product' , [ProductController::class , 'show_product_sale_form']);
Route::post('/add-product' , [ProductController::class , 'put_product_for_sale']);

Route::get('/add-category' , [CategoryController::class , 'show_category_form']);
Route::post('/add-category' , [CategoryController::class ,'add_category']);

Route::get('/add-brand' , [BrandController::class , 'add_brand_form']);
Route::post('/add-brand' , [BrandController::class ,'add_brand']);

Route::get('/single-profile/user/{user}' , [UserController::class, 'user_single_profile']);
Route::get('/user-information/user/{user}' , [UserController::class , 'user_information_form']);
Route::put('/user-information/user/{user}' , [UserController::class , 'change_user_information']);
Route::get('/user-password/user/{user}' , [UserController::class, 'user_password_form']);
Route::put('/user-password/user/{user}' , [UserController::class, 'change_user_password']);

Route::get('/admin-information/admin/{admin}' , [AdminController::class, 'admin_information_form']);
Route::put('/admin-information/admin/{admin}' , [AdminController::class, 'change_admin_information']);

Route::get('/avatar-form' , [UserController::class,'show_avatar_form']);
Route::post('/set-profile/user/{user}' , [UserController::class, 'set_profile_user']);

Route::post('/set-image-for-product-frorm/{product}' , [ProductController::class, 'set_product_image']);
Route::get('/all-productions' , [ProductController::class,'get_all_productions']);

Route::get('/single-product/product/{product}' , [ProductController::class, 'show_single_product']);

Route::get('/show-all-comments/product/{product}' , [ProductController::class,'show_all_comments_of_product']);
Route::post('/add-to-order/product/{product}' , [OrderController::class,'add_product_to_order']);

Route::get('/comment-form/{product}' , [CommentController::class,'show_comment_form']);
Route::post('/add-comment/product/{product}' , [CommentController::class, 'add_comment']);

Route::delete('/delete-comment/comment/{comment}' , [CommentController::class,'delete_comment']);
Route::get('/edit-comment/form/{comment}' , [CommentController::class,'edit_comment_form']);
Route::put('/edit-comment/comment/{comment}' , [CommentController::class,'edit_comment']);
Route::post('/ban-user/user/{user}' , [AdminController::class,'ban_user']);
Route::delete('/unban-user/user/{user}' , [AdminController::class, 'unban_user']);
Route::get('/ban-list' , [AdminController::class, 'ban_list']);
Route::get('/search' , function(){
    return view('search-bar-form');
} );
Route::get('/search-user-input/result' , [UserController::class, 'search_by_user_input']);
Route::get('/search-brand/{term}/result' , [UserController::class, 'search_by_brand']);
Route::get('/search-category/{term}/result' , [UserController::class, 'search_by_category']);