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

Route::get('/', function () {
    return view('welcome');
});
$router->get('/bstp', function () {
    return view('bstp');
});

//前台模块
Route::group(['middleware'=>'web'],function ($router)
{

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    $router->get('/', 'Home\IndexController@index');

    Route::get('/cate/{cate_id}', 'Home\IndexController@cate');
    Route::get('/a/{art_id}', 'Home\IndexController@article');

});

//后台模块
Route::group(['prefix' => 'admin','namespace' => 'Admin', 'middleware'=>'web'],function ($router)
{

    $router->get('lang/{locale}', 'LanguageController@setLocale')->name('admin.lang');

    $router->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $router->post('login', 'LoginController@login');
    /*$router->get('register', 'LoginController@showRegister')->name('admin.register');
    $router->post('register', 'LoginController@register');*/
    $router->post('logout', 'LoginController@logout')->name('admin.logout');
    $router->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');       //发送重置密码的邮件
    $router->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');     //发送重置密码邮件的表单页面
    $router->post('password/reset', 'ResetPasswordController@reset');                                                   //重置密码
    $router->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');      //重置密码表单

    $router->get('password/change', 'IndexController@showChangeForm');
    $router->post('password/change', 'IndexController@changePassword');

    $router->get('/', 'IndexController@index');
    $router->get('index', 'IndexController@index');
    $router->get('info', 'IndexController@info');

    $router->post('cate/setOrder', 'CategoryController@setOrder');
    $router->resource('category', 'CategoryController');

    $router->resource('article', 'ArticleController');
    $router->any('uploadify', 'AdminController@uploadify');

    $router->post('link/setOrder', 'LinkController@setOrder');
    $router->resource('link', 'LinkController');

    $router->post('nav/setOrder', 'NavController@setOrder');
    $router->resource('nav', 'NavController');

    $router->post('config/setOrder', 'ConfigController@setOrder');
    $router->post('config/setConf', 'ConfigController@setConf');
    $router->resource('config', 'ConfigController');



    //session测试
    /*$router->any('setsession', 'AdminController@setsession');
    $router->any('getsession', 'AdminController@getsession');*/

});
