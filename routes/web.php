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
Route::get('new/new','Index\NewController@new');

Route::get('/','Index\IndexController@index');
//邮件发送
Route::get('mail/send','MailController@send');

Route::get('new/show','Index\NewController@show');
//用户登录
Route::get('user/login','Index\UserController@login');
//用户注册
Route::any('user/register','Index\UserController@register');
//主页
Route::get('index/index','Index\IndexController@index');
//商品列表
Route::get('goods/list','Index\GoodsController@list');
//商品购物车
Route::get('goods/cart','Index\GoodsController@cart');
//商品订单
Route::get('goods/order','Index\GoodsController@order');
//尚品详情
Route::get('goods/particulars','Index\GoodsController@particulars');
//用户个人中心
Route::get('user/userInfo','Index\UserController@userInfo');
//注册跳转
Route::post('register','Index\UserController@register');
//用户邮箱注册
Route::any('user/emailRegister','Index\UserController@emailRegister');
//用户邮箱登录
Route::any('user/emailLogin','Index\UserController@emailLogin');
//邮箱注册跳转
Route::any('emailRegister','Index\UserController@emailRegister');
//登录
Route::post('login','Index\UserController@login');
//退出登录
Route::get('user/loginOut','Index\UserController@loginOut');
//邮箱登录
Route::post('emailLogin','Index\UserController@emailLogin');

Route::post('user/captcha','Index\UserController@captcha');


//后台
//登录
Route::group(['middleware' => ['login']], function () {
    //后台首页
    Route::get('adminindex/index','Admin\AdminIndexController@index');
    Route::get('admingoods/add','Admin\AdminGoodsController@add');
    Route::get('admingoods/list','Admin\AdminGoodsController@list');
    Route::get('adminuser/add','Admin\AdminUserController@add');
    Route::post('add','Admin\AdminUserController@add');
    Route::get('adminuser/delete','Admin\AdminUserController@delete');
    Route::get('adminuser/userSave','Admin\AdminUserController@userSave');
    Route::post('userUpdate','Admin\AdminUserController@userUpdate');
    Route::get('adminuser/list','Admin\AdminUserController@list');
    Route::get('adminuser/roleAdd','Admin\AdminUserController@roleAdd');
    Route::get('adminuser/roleDelete','Admin\AdminUserController@roleDelete');
    Route::get('adminuser/roleSave','Admin\AdminUserController@roleSave');
    Route::post('roleUpdate','Admin\AdminUserController@roleUpdate');
    Route::post('roleAdd','Admin\AdminUserController@roleAdd');
    Route::get('adminuser/roleList','Admin\AdminUserController@roleList');
    Route::get('adminuser/nodeList','Admin\AdminUserController@nodeList');
    Route::post('nodeAdd','Admin\AdminUserController@nodeAdd');
    Route::get('adminuser/nodeDelete','Admin\AdminUserController@nodeDelete');
    Route::get('adminuser/nodeSave','Admin\AdminUserController@nodeSave');
    Route::post('nodeUpdate','Admin\AdminUserController@nodeUpdate');
    Route::get('adminuser/nodeAdd','Admin\AdminUserController@nodeadd');
    Route::get('adminuser/userRole','Admin\AdminUserController@userRole');
    Route::post('userRoleAdd','Admin\AdminUserController@userRoleAdd');
    Route::get('adminuser/roleNode','Admin\AdminUserController@roleNode');
    Route::get('manage','Admin\AdminUserController@manage');
    Route::post('roleMenuAdd','Admin\AdminUserController@roleMenuAdd');
});
Route::resource('/prompt','PromptController');
Route::get('adminuser/login','Admin\AdminUserController@login');

Route::post('adminuser/loginout','Admin\AdminUserController@loginout');


Route::post('adminlogin','Admin\AdminUserController@login');


//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
