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
//验证码 


/* Route::get('seller/code','Seller\LoginController@code'); */
/**
 * 前台
 */
//登录
Route::resource('/home/login','Home\LoginController');


Route::group(['prefix'=>'home','namespace'=>'Home'], function(){
    //注册
    Route::resource('register','RegisterController');
    Route::resource('index','IndexController');
});

/**
 * 管理员后台
 */
//登录
Route::resource('/admin/login','Admin\LoginController');

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin.login'], function(){
    //普通用户管理
    Route::resource('user','UserController');
    //商家分类
    Route::resource('sellerclass','SellerClassController');
    //商家信息
    Route::resource('seller','SellerController');
    //订单
    Route::resource('order','OrderController');
    //评价
    Route::resource('eval','EvalController');
    //收藏
    Route::resource('collection','CollectionController');
    //审核
    Route::resource('examine','ExamineController');
    //后台管理员用户
    Route::resource('adminuser','AdminUserController');

});


/**
 * 商家后台
 */

//登录
Route::resource('/seller/login','Seller\LoginController');

Route::group(['prefix'=>'seller','namespace'=>'Seller','middleware'=>'seller.login'], function(){
    //注册
    Route::resource('register','RegisterController');
    //商家用户个人中心
    Route::resource('index','IndexController');
    //菜品分类管理
    Route::resource('goodsclass','GoodsClassController');
    //菜品管理
    Route::resource('goods','GoodsController');
    //验证上传图片
    Route::any('upload','GoodsController@upload');
    //验证表单
    Route::any('gnameajax','GoodsController@gnameajax');
    //ajax 改变商品的状态 在售->售罄
    Route::any('zaishou','GoodsController@zaishou');

    //订单管理
    Route::resource('order','OrderController');
    //评价
    Route::resource('eval','EvalController');

});




