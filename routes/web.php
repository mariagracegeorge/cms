<?php

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

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::redirect('/', '/home');

Route::get('/home', 'HomeController@home');
Route::get('/category/{slug}', 'HomeController@showCategoryPage');
Route::get('/add-page/{parent_id?}/{type?}', 'HomeController@addNewPage');
Route::get('/create-page', 'HomeController@createNewPage');
Route::get('/category/show-edit-page/{id}', 'HomeController@showEditPage');
Route::get('/category/update/{id}', 'HomeController@updateProduct');
Route::get('/category/delete/{id}', 'HomeController@deleteProduct');
