<?php
// use Symfony\Component\Routing\Route;

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
//三个静态路由 分别返回首页、帮助页和关于页面
Route::get('/','StaticPagesController@home')->name('home');
Route::get('/help','StaticPagesController@help')->name('help');
Route::get('/about','StaticPagesController@about')->name('about');

Route::get('/signup','UsersController@create')->name('signup');

/**
 * resource 路由等于下面注释掉的路由
 * Route::get('/users', 'UsersController@index')->name('users.index');
 * Route::get('/users/create', 'UsersController@create')->name('users.create');
 * Route::get('/users/{user}', 'UsersController@show')->name('users.show');
 * Route::post('/users', 'UsersController@store')->name('users.store');
 * Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
 * Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
 * Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
 */
Route::resource('users','UsersController');

/*
 * 会话控制器
 */
Route::get('login','SessionsController@create')->name('login');
Route::post('login','SessionsController@store')->name('login');
Route::delete('login','SessionsController@destroy')->name('logout');

/**
 * 邮件激活路由
 */
Route::get('signup/confirm/{token}','UsersController@confirmEmail')->name('confirm_email');

/**
 * 重设密码相关路由
 */
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

/**
 * 微博路由
 */
Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);
