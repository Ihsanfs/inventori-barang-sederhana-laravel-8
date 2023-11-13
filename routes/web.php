<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrgMskController;
use App\Http\Controllers\BrgKeluarController;
use App\Http\Controllers\RekapController;
use Illuminate\Support\Facades\Auth;



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
    return view('welcome');
});
// Route::get('/login', function(){
//     return view('index');
// });
// Route::get('/home', function(){
//     return view('home');
// });
// Route::get('/login', [AuthController::class, 'index']);
// Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/login', [AuthController::class, 'index'])->name('login');
// Route::post('/proses', [AuthController::class, 'proses_login'])->name('proses');

// Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
// Route::get('/', [AuthController::class, 'index'])->name('index');

// Route::middleware(['auth', 'CheckLevel:admin'])->group(function () {
//     Route::get('admin', function () {
//         return 'layout.home';
//     });
// });
// Route::middleware(['auth', 'CheckLevel:admin'])->group(function () {
// Route::post('/login', [LoginController::class, 'login'])->name('login');

//     Route::get('/home', [HomeController::class, 'index'])->name('home');
// });
// Route::middleware(['auth', 'admin'])->group(function () {

//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//  });
Route::get('/login', [AuthController::class, 'index'])->name('login');


Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('brg_msk/proses', [BrgMskController::class, 'proses']);
Route::get('brg_keluar/proses', [BrgKeluarController::class, 'proses']);


Route::group(['middleware' => ['auth']], function () {
    //admin akses
    Route::group(['middleware' => ['cek_login:admin']], function () {
    Route::resource('user', UserController::class);
    Route::post('user', [UserController::class, 'index'])->name('admin');
    Route::get('changestatus', [UserController::class, 'changestatus']);

    Route::get('user/status', [UserController::class, 'status'])->name('status');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
//admin
    Route::post('create', [UserController::class, 'store'])->name('create');
    Route::put('user/{$id}', [UserController::class, 'update'])->name('update');
    Route::delete('user/{$id}', [UserController::class, 'destroy'])->name('destroy');
//kategori
    Route::resource('kategori', KategoriController::class);
    Route::get('kategori', [KategoriController::class, 'index']);
    Route::post('kategori_create', [KategoriController::class, 'store'])->name('simpan_kategori');
    Route::put('kategori/{$id}', [KategoriController::class, 'update'])->name('update_kategori');
    Route::delete('kategori/{$id}', [KategoriController::class, 'destroy'])->name('destroy_kategori');

    //barang
    Route::resource('barang', BarangController::class);
    Route::get('barang', [BarangController::class, 'index']);
    Route::post('barang', [BarangController::class, 'store'])->name('simpan_barang');
    Route::put('barang/{$id}', [BarangController::class, 'update'])->name('update_barang');
    Route::delete('barang/{$id}', [BarangController::class, 'destroy'])->name('destroy_barang');
//brg masuk

    Route::resource('brg_msk', BrgMskController::class);
        Route::get('brg_msk', [BrgMskController::class, 'index']);
        Route::get('brg_msk/create', [BrgMskController::class, 'create']);


        Route::get('brg_msk/edit{$id}', [BrgMskController::class, 'show'])->name('edit');
        // Route::get('brg_msk', [BrgMskController::class, 'show'])->name('edit');
        Route::post('brg_msk/store', [BrgMskController::class, 'store'])->name('simpan_barang_masuk');
        Route::put('brg_msk/update{$id}', [BrgMskController::class, 'update'])->name('update_barang_msk');

        Route::delete('brg_msk/{$id}', [BrgMskController::class, 'destroy'])->name('destroy_barang_msk');

 //barang keluar
 Route::resource('brg_keluar', BrgKeluarController::class);

        Route::get('brg_keluar', [BrgKeluarController::class, 'index']);
        Route::get('brg_keluar/{$id}', [BrgKeluarController::class, 'show']);
        Route::get('brg_keluar/create', [BrgKeluarController::class, 'create']);



        // Route::get('brg_keluar', [BrgKeluarController::class, 'show']);
        Route::post('brg_keluar/store', [BrgKeluarController::class, 'store'])->name('simpan_barang_keluar');
        Route::put('brg_keluar/{$id}', [BrgKeluarController::class, 'update'])->name('update_barang_keluar');

        Route::delete('brg_keluar/{$id}', [BrgKeluarController::class, 'destroy'])->name('destroy_barang_keluar');


    });


//hitung data
Route::get('dashboard', [RekapController::class, 'index']);
Route::get('hitung_masuk', [RekapController::class, 'masuk'])->name('masuk');
Route::get('hitung_keluar', [RekapController::class, 'keluar'])->name('keluar');
Route::get('hitung_kategori', [RekapController::class, 'kategori_hitung'])->name('kategori_hitung');
Route::get('hitung_user', [RekapController::class, 'user_hitung'])->name('hitung_user');
Route::get('hitung_barang', [RekapController::class, 'hitung_barang'])->name('hitung_barang');







    // gudang akses

});
// Route::middleware(['auth', 'checkLevel:user'])->group(function () {

//     // Route::get('/home', [HomeController::class, 'index'])->name('home');
// });
// Route::group(['middleware'=> ['auth', 'checkLevel:admin']],function () {
//     //data master
//     Route::post('/user', [UserController::class, 'index']);
//     Route::post('/user/store', [UserController::class, 'store']);

//     Route::post('/user', [UserController::class, 'update']);
//     Route::get('/user', [UserController::class, 'store']);



//     //kategori
//     Route::get('/kategori', [KategoriController::class, 'index']);
//     //barang
//     Route::get('/barang', [HomeController::class, 'index']);

// });





// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
