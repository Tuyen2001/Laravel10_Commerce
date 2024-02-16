<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserSpatieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
//cart giỏ hàng
Route::get('/cart',[ CartController::class,'index'])->name('cart.index');
Route::post('/add-cart',[ CartController::class,'add'])->name('cart.add');


// home  trang chủ người dùng
Route::get('/',[ HomeController::class,'index'])->name('index');
Route::get('/detail/{slug}',[ HomeController::class,'detail'])->name('detail');

Route::get('/login',[ UserController::class,'login'])->name('login');
Route::post('/login',[ UserController::class,'postLogin']);

Route::get('/logout',[ UserController::class,'logout'])->name('logout');

Route::get('/register',[ UserController::class,'register'])->name('register');
Route::post('/register',[ UserController::class,'postRegister']);




//đăng nhập admin
// route logon từ Middleware/AdminAuthen.. bắt quay về đăng nhập nếu quyền role k phải = [1]
Route::get('/logon',[AdminController::class,'logon'])->name('logon');
Route::post('/logon',[AdminController::class,'postLogon'])->name('admin.logon');
// prefix la tiền tố
// middleware có tên 'admin' tên bí danh lấy từ Request/Kernel.php
Route::prefix('admin')->middleware('admin')->group(function (){
    Route::get('/',[ DashBoardController::class,'index'])->name('admin.index');

    // user
    Route::resource('/user', UserSpatieController::class);
    // phân quyền user
    Route::get('/phan-quyen/{id}',[ UserSpatieController::class,'phanquyen'])->name('admin.user.phanquyen');
    Route::get('/vai-tro/{id}',[ UserSpatieController::class,'vaitro'])->name('admin.user.vaitro');
    // thêm vai trò
    Route::post('/insert_roles/{id}',[ UserSpatieController::class,'insert_roles'])->name('admin.user.insertro');
    // thêm phân quyền
    Route::post('/insert_permission/{id}',[ UserSpatieController::class,'insert_permission_id'])->name('admin.user.insertper');

    Route::post('/insert_permission',[ UserSpatieController::class,'insert_permission'])->name('admin.user.insertpermission');


    // category
    Route::resource('category', CategoryController::class); // resource bao gồm crud:

    //tao thung rac category chua dl da bi xoa
    Route::get('/category-trash',[CategoryController::class,'trash'])->name('category.trash');
    // khoi phuc lay theo mang catetory
    Route::get('/category-restore/{id}',[CategoryController::class,'restore'])->name('category.restore');
    // xoa vinh vien tu trash category
    Route::get('/category-forceDelete/{id}',[CategoryController::class,'forceDelete'])->name('category.forceDelete');

    // product
    Route::resource('product', ProductController::class); // resource bao gồm crud:


});


