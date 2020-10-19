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
Route::get('/dashboard', 'CuisineController@index')->name('dashboard');
Route::get('/cuisine', 'CuisineController@index')->name('cuisine');
Route::get('/recipe', 'RecipeController@index')->name('recipe');
Route::post('/cuisine/addCuisine', 'CuisineController@addCuisine');
Route::post('/cuisine/getAllCuisine', 'CuisineController@getAllCuisine');
Route::post('/recipe/addRecipe', 'RecipeController@addRecipe');
Route::get('/admin', 'AdminLoginController@index')->name('admin');
Route::post('/AdminLogin/loginAdmin', 'AdminLoginController@loginAdmin');
Route::get('/AdminLogin/logout', 'AdminLoginController@index');
Route::post('/recipe/fetchAllRecipe', 'RecipeController@fetchAllRecipe');

Route::get('/RecipeDetail', 'RecipeDetailController@index')->name('RecipeDetail');

