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



///////////////////////////////////////////////////////////
//DB//

Route::resource('products', 'ProductController');  // for all operations on DB as 'add','update','delete','show'

Route::get('product/soft/delete/{id}', 'ProductController@softDelete')->name('soft.delete');

Route::get('product/trash', 'ProductController@trashedProducts')->name('product.trash');

Route::get('product/back/from/trash/{id}', 'ProductController@backFromSoftDelete')->name('product.backFrom.trash');

Route::get('product/delete/from/DB/{id}', 'ProductController@deleteForEver')->name('product.deleteFromDB.trash');
