<?php

use Illuminate\Support\Facades\Route;
//agreagamos los controladores

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

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
// Auth::routes(['register' => false]);
Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
    });


Route::get('/registerUser', [App\Http\Controllers\RegisterUserController::class, 'create'])->name('registerUser');
Route::post('/registerUser', [App\Http\Controllers\RegisterUserController::class, 'store'])->name('registerUser.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/info', [App\Http\Controllers\DatosEmpresaController::class, 'index'])->name('info');
Route::resource('/userClient', App\Http\Controllers\UserClientController::class, ['names' => 'userClient']);
Route::resource('/product', App\Http\Controllers\ProductoController::class, ['names' => 'product']);
Route::resource('/datosEmpresa', App\Http\Controllers\DatosEmpresaController::class, ['names' => 'datosEmpresa']);


Route::resource('/rma', App\Http\Controllers\RmaController::class, ['names' => 'rma']);
Route::resource('/empresa', App\Http\Controllers\EmpresaController::class, ['names' => 'empresa']);
Route::resource('/faq', App\Http\Controllers\FaqController::class, ['names' => 'faq']);

//Email
Route::get('/sendEmail', [App\Http\Controllers\EmpresaController::class, 'sendEmail'])->name('sendEmail');

//PDF
Route::get('/rmapdf/{id}', [App\Http\Controllers\RmaController::class, 'rmaPDF'])->name('rmapdf');

// Ajax
Route::get('/rma/selectDir/{id}', [App\Http\Controllers\RmaController::class, 'selectDir']);
Route::get('/rma/selectPhoto/{id}', [App\Http\Controllers\RmaController::class, 'selectPhoto']);
Route::get('/rma/photoNotaCompra/{id}', [App\Http\Controllers\RmaController::class, 'photoNotaCompra']);

//Route::post('/rmastatus/{id}', [App\Http\Controllers\RmaController::class, 'rmaStatus'])->name('rmasstatus');


Route::any('{query}',
    function() { return redirect('/'); })
    ->where('query', '.*');
