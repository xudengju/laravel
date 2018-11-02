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
    //后台商品添加
    Route::get('admingoods/add','Admin\AdminGoodsController@add');
    Route::post('goodsAdd','Admin\AdminGoodsController@add');
    //商品列表
    Route::get('admingoods/list','Admin\AdminGoodsController@list');
    //商品删除
    Route::get('adminGoods/delete','Admin\AdminGoodsController@delete');
    //商品修改
    Route::get('adminGoods/goodsSave','Admin\AdminGoodsController@goodsSave');
    Route::post('goodsUpdate','Admin\AdminGoodsController@goodsUpdate');
    // 商品分类列表
    Route::get('adminGoods/typeList','Admin\AdminGoodsController@typeList');
    //商品分类添加
    Route::get('adminGoods/typeAdd','Admin\AdminGoodsController@typeAdd');
    Route::post('typeAdd','Admin\AdminGoodsController@typeAdd');
    //商品分类删除
    Route::get('adminGoods/typeDelete','Admin\AdminGoodsController@typeDelete');
    //商品分类修改
    Route::get('adminGoods/typeSave','Admin\AdminGoodsController@typeSave');
    Route::post('typeUpdate','Admin\AdminGoodsController@typeUpdate');
    //管理员添加
    Route::get('adminuser/add','Admin\AdminUserController@add');
    Route::post('add','Admin\AdminUserController@add');
    //管理员删除
    Route::get('adminuser/delete','Admin\AdminUserController@delete');
    //管理员修改
    Route::get('adminuser/userSave','Admin\AdminUserController@userSave');
    Route::post('userUpdate','Admin\AdminUserController@userUpdate');
    //管理员列表
    Route::get('adminuser/list','Admin\AdminUserController@list');
    //角色添加
    Route::get('adminuser/roleAdd','Admin\AdminUserController@roleAdd');
    Route::post('roleAdd','Admin\AdminUserController@roleAdd');
    //角色删除
    Route::get('adminuser/roleDelete','Admin\AdminUserController@roleDelete');
    //角色修改
    Route::get('adminuser/roleSave','Admin\AdminUserController@roleSave');
    Route::post('roleUpdate','Admin\AdminUserController@roleUpdate');
    //角色列表
    Route::get('adminuser/roleList','Admin\AdminUserController@roleList');
    //权限列表
    Route::get('adminuser/nodeList','Admin\AdminUserController@nodeList');
    //权限添加
    Route::get('adminuser/nodeAdd','Admin\AdminUserController@nodeadd');
    Route::post('nodeAdd','Admin\AdminUserController@nodeAdd');
    //权限删除
    Route::get('adminuser/nodeDelete','Admin\AdminUserController@nodeDelete');
    //权限修改
    Route::get('adminuser/nodeSave','Admin\AdminUserController@nodeSave');
    Route::post('nodeUpdate','Admin\AdminUserController@nodeUpdate');
    //用户分配角色
    Route::get('adminuser/userRole','Admin\AdminUserController@userRole');
    Route::post('userRoleAdd','Admin\AdminUserController@userRoleAdd');
    //角色分配权限
    Route::get('adminuser/roleNode','Admin\AdminUserController@roleNode');
    Route::post('roleMenuAdd','Admin\AdminUserController@roleMenuAdd');
    //修改用户状态
    Route::get('manage','Admin\AdminUserController@manage');
    //属性列表
    Route::get('adminGoods/attrList','Admin\AdminGoodsController@attrList');
    //属性删除
    Route::get('adminGoods/attrDelete','Admin\AdminGoodsController@attrDelete');
    //属性修改
    Route::get('adminGoods/attrSave','Admin\AdminGoodsController@attrSave');
    Route::post('attrUpdate','Admin\AdminGoodsController@attrUpdate');
    //属性添加
    Route::get('adminGoods/attrAdd','Admin\AdminGoodsController@attrAdd');
    Route::post('attrAdd','Admin\AdminGoodsController@attrAdd');
    //属性值添加
    Route::get('adminGoods/attrValueAdd','Admin\AdminGoodsController@attrValueAdd');
    Route::post('attrValueAdd','Admin\AdminGoodsController@attrValueAdd');
    //属性值列表
    Route::get('adminGoods/attrValueList','Admin\AdminGoodsController@attrValueList');
    //属性值删除
    Route::get('adminGoods/attrValueDelete','Admin\AdminGoodsController@attrValueDelete');
    //属性值修改
    Route::get('adminGoods/attrValueSave','Admin\AdminGoodsController@attrValueSave');
    Route::post('attrValueUpdate','Admin\AdminGoodsController@attrValueUpdate');
    //分配属性
    Route::get('adminGoods/typeAttr','Admin\AdminGoodsController@typeAttr');
    Route::post('typeAttrAdd','Admin\AdminGoodsController@typeAttrAdd');
    //分配属性值
    Route::get('adminGoods/attrValueNode','Admin\AdminGoodsController@attrValueNode');
    Route::post('attrValueNodeAdd','Admin\AdminGoodsController@attrValueNodeAdd');
    //sku添加
    Route::get('adminGoods/skuAdd','Admin\AdminGoodsController@skuAdd');
    Route::post('adminGoods/getAttrs','Admin\AdminGoodsController@getAttrs');
    Route::post('getAttrValue','Admin\AdminGoodsController@getAttrValue');
    Route::post('adminGoods/getAttrAttrValue','Admin\AdminGoodsController@getAttrAttrValue');

});
Route::resource('/prompt','PromptController');
Route::get('adminuser/login','Admin\AdminUserController@login');

Route::post('adminuser/loginout','Admin\AdminUserController@loginout');


Route::post('adminlogin','Admin\AdminUserController@login');


//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
