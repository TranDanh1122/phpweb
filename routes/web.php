<?php
use App\Http\Controllers\LanguageController;
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

Route::get('/','DashboardController@usersDash')->name('dash-user');
Route::get('/dash','DashboardController@usersDash')->name('dash-user');
Route::get('/login','AuthController@loginPage')->name('login');
Route::get('/register','AuthController@registerpage')->name('register');
Route::get('/logout','AuthController@logout')->name('register');
Route::post('/dangky', 'AuthController@register')->name('saveuser');
Route::post('/dangnhap', 'AuthController@login')->name('dangnhap');
Route::get('/dangbai','Mua_Ban_Controller@loadcreatepage')->name('dangbaiban');
Route::get('/suabai/{id}','Mua_Ban_Controller@loadeditpage');
Route::get('/sanpham/{id}','Mua_Ban_Controller@viewsanpham');
Route::get('/allpost','Mua_Ban_Controller@allmathang');
Route::post('/uploadanh', 'Mua_Ban_Controller@upanh')->name('dangnhap');
Route::post('/luubai', 'Mua_Ban_Controller@store_mathang')->name('luubai');
Route::post('/editbai/{id}', 'Mua_Ban_Controller@edit_mathang')->name('suabai');
Route::post('/luuanh', 'Mua_Ban_Controller@luuanh');
