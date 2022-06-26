<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/homeadmin', function () {
//     return view('admin.main');
// });

Auth::routes();

Route::get('/homeadmin', [HomeController::class, 'index'])->name('admin.main')->middleware('isAdmin');

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [BerandaController::class, 'index']);

//route employee
Route::resource('/employee', EmployeeController::class);

//route supplier
Route::resource('/supplier', SupplierController::class);

Route::resource('/product', ProductController::class);

Route::resource('/customer', CustomerController::class);

Route::resource('pesan', PesanController::class);
Route::get('/pesan/{id}', [PesanController::class, 'indexProduct']);
Route::post('pesan/{id}', [PesanController::class, 'pesan']);
Route::get('check-out', [PesanController::class, 'check_out']);
Route::delete('check-out/{id}', [PesanController::class, 'delete']);
Route::get('konfirmasi-check-out', [PesanController::class, 'konfirmasi']);

Route::get('history', [HistoryController::class, 'indexhistory']);
Route::get('history/{id}', [HistoryController::class, 'detail']);

Route::get('profile', [ProfileController::class, 'index']);
Route::post('profile', [ProfileController::class, 'update']);

Route::resource('admin2', TransaksiController::class);
Route::resource('admin3', PembelianController::class);

Route::get('/history/cetak_pdf/{id}', [HistoryController::class, 'cetak_pdf'])->name('cetak_pdf');
