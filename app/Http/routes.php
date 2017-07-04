<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
//    return view('welcome');
    return view('home/index');
});
// 验证码的路由
Route::get('/code','CodeController@code');
/**
 * 前台
 */
//登录
Route::controller('/home/login','Home\LoginController');
//注册
Route::controller('/home/register','Home\RegisterController');

/**
 * 管理员后台
 */
//登录
Route::controller('/admin/login','Admin\LoginController');
//普通用户管理
Route::controller('/admin/user','Admin\UserController');
//商家分类
Route::controller('/admin/sellerclass','Admin\SellerClassController');
//商家信息
Route::controller('/admin/seller','Admin\SellerController');
//订单
Route::controller('/admin/order','Admin\OrderController');
//评价
Route::controller('/admin/eval','Admin\EvalController');
//收藏
Route::controller('/admin/collection','Admin\CollectionController');




/**
 * 商家后台
 */
//登录
Route::controller('/seller/login','Seller\LoginController');
//注册
Route::controller('/seller/register','Seller\RegisterController');
//商家用户个人中心
Route::controller('/seller/index','Seller\IndexController');
//菜品分类管理
Route::controller('/seller/goodsclass','Seller\GoodsClassController');
//菜品管理
Route::controller('/seller/goods','Seller\GoodsController');
//订单管理
Route::controller('/seller/order','Seller\OrderController');
//评价
Route::controller('/seller/eval','Seller\EvalController');
//验证码
Route::get('seller/code','Seller\LoginController@code');

//Route::group([], function(){
//
//});