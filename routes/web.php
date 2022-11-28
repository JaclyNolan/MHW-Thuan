<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\SimpleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAge;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MyController::class, "index"]);

Route::get('/blank', function(){
    return(view('admin.layout.index'));
});

Route::group(['prefix'=>'/admin/admin'],function(){
    Route::get('/',[AdminController::class, "index"])->name('admin.admin.index');
    Route::get('/create',[AdminController::class, "getCreate"])->name('admin.admin.create');
    Route::post('/create',[AdminController::class, "postCreate"]);
    Route::get('/edit/{id}',[AdminController::class, "getEdit"])->name('admin.admin.edit');
    Route::post('/edit/{id}',[AdminController::class, "postEdit"]);
    Route::get('/delete/{id}',[AdminController::class, "destroy"]);
});

Route::group(['prefix'=>'/admin/laptop'],function(){
    Route::get('/',[LaptopController::class, "index"])->name('admin.laptop.index');
    Route::get('/create',[LaptopController::class, "getCreate"])->name('admin.laptop.create');
    Route::post('/create',[LaptopController::class, "postCreate"]);
    Route::get('/edit/{id}',[LaptopController::class, "getEdit"])->name('admin.laptop.edit');
    Route::post('/edit/{id}',[LaptopController::class, "postEdit"]);
    Route::get('/delete/{id}',[LaptopController::class, "destroy"]);
});

Route::group(['prefix'=>'/admin/simple'],function(){
    Route::get('/{table_name}',[SimpleController::class, "index"])->name('admin.simple.index');
    Route::get('/create/{table_name}',[SimpleController::class, "create"])->name('admin.simple.create');
    Route::post('/create/{table_name}',[SimpleController::class, "store"]);
    Route::get('/edit/{table_name}/{id}',[SimpleController::class, "edit"])->name('admin.simple.edit');
    Route::post('/edit/{table_name}/{id}',[SimpleController::class, "update"]);
    Route::get('/delete/{table_name}/{id}',[SimpleController::class, "destroy"]);
});

Route::group(['prefix'=>'/admin/image'],function(){
    Route::get('/',[ImageController::class, "index"])->name('admin.image.index');
    Route::get('/create',[ImageController::class, "create"])->name('admin.image.create');
    Route::post('/create',[ImageController::class, "store"]);
    Route::get('/edit/{id}',[ImageController::class, "edit"])->name('admin.image.edit');
    Route::post('/edit/{id}',[ImageController::class, "update"]);
    Route::get('/delete/{id}',[ImageController::class, "destroy"]);
});

Route::group(['prefix'=>'/admin/banner'],function(){
    Route::get('/',[BannerController::class, "index"])->name('admin.banner.index');
    Route::get('/create',[BannerController::class, "create"])->name('admin.banner.create');
    Route::post('/create',[BannerController::class, "store"]);
    Route::get('/edit/{id}',[BannerController::class, "edit"])->name('admin.banner.edit');
    Route::post('/edit/{id}',[BannerController::class, "update"]);
    Route::get('/delete/{id}',[BannerController::class, "destroy"]);
});


Route::get('/admin/user/show', function () {
    return view('admin.user.show');
});
Route::post('/admin/user/show', [UserController::class, "show"])->name("userShow");

Route::get('/admin/user/create', function () {
    return view('admin.user.create');
});
Route::post('/admin/user/create', [UserController::class, "create"])->name("userCreate");

// Route::get('/demo', [MyController::class, "demo"]);

// Route::get('/getForm', function () {
//     return view('postForm');
// });

// Route::post('postLogin', [MyController::class, "postForm"])->name("postForm");

// Route::get('qb/get',function(){
//     $email = DB::table('admin') -> where('aEmail', 'anhbg330011@gmail.com') -> first();
// });



// Route::get('/hello', function () {
//     echo "bitches get the ditches";
// });

// Route::get('/hello-world', function () {
//     return view('hello-world');
// });

// Route::get('/Jacly/{year}/{class?}', function ($y, $c) {
//     // return view('hello-world');

//     if ($c == null) {
//         echo "sinh năm: " . $y;
//     } else {
//         echo "sinh năm: " . $y . " lớp: " . $c;
//     }
// });

// Route::group(['prefix' => 'laptop'], function () {
//     Route::get('ASUS', function () {
//         echo "ASUS laptop";
//     });

//     Route::get('Dell', function () {
//         echo "Dell laptop";
//     });

//     Route::get('HP', function () {
//         echo "HP laptop";
//     });
// });

// Route::group(['prefix' => 'product'], function () {
//     Route::get('add', function () {
//         return view('product.add');
//     }) -> name("Add a product");

//     Route::get('edit', function () {
//         return view('product.edit');
//     });

//     Route::get('viewproduct', function () {
//         return view('product.viewproduct');
//     });
// });

// Route::group(['prefix' => 'user'], function () {
//     Route::get('add', function () {
//         return view('user.add');
//     }) -> name("Add a product");

//     Route::get('edit', function () {
//         return view('user.edit');
//     });

//     Route::get('viewproduct', function () {
//         return view('user.viewproduct');
//     });
// });

// Route::get('age/{age}', function($age, $test) {
//     return ("CornHub lmao");
// }) -> middleware(CheckAge::class);
