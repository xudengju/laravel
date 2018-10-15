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
Route::get('user/user','Index\UserController@user');
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
Route::post('user','Index\UserController@user');
//退出登录
Route::get('user/loginOut','Index\UserController@loginOut');
//邮箱登录
Route::post('emailLogin','Index\UserController@emailLogin');

Route::post('user/captcha','Index\UserController@captcha');


//后台
//登录
Route::get('user/login','Admin\UserController@login');
//注册
Route::get('user/register','Admin\UserController@register');
//后台首页
Route::get('index/index','Admin\IndexController@index');