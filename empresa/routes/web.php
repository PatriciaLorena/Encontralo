<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categoria', 'CategoriaController');
Route::resource('marca', 'MarcaController');
Route::resource('articulo', 'ArticuloController');
Route::resource('empresa', 'EmpresaController');
Route::get('/pdfcategoria', 'PDFController@PDFCategoria')->name('reportePDFCategoria');
Route::get('/pdfmarca', 'PDFController@PDFMarca')->name('reportePDFMarca');
Route::get('/pdfempresa', 'PDFController@PDFEmpresa')->name('reportePDFEmpresa');
Route::get('/pdfarticulo', 'PDFController@PDFArticulo')->name('reportePDFArticulo');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/gmaps', ['as ' => 'gmaps', 'uses' => 'GmapsController@index']);
