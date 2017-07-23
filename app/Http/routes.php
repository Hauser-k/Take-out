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


 DB::listen(function($sql, $bindings, $time) {
                // dump($sql);
            });
// 前台商家路由
Route::resource('/home/shangjia','Home\shangjiaController');

// 前台订单路由
Route::any('/home/jie','Home\jiezhController@index');
Route::any('/home/fukuan','Home\jiezhController@Show');
Route::any('/home/suan','Home\jiezhController@jiesu');

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
//地址选择页
Route::resource('/home/addr','Home\AddrController');
//页面搜索
Route::any('/home/search/dian','Home\SearchController@dian');
Route::any('/home/search/caidan','Home\SearchController@caidan');
//商家入驻
Route::resource('/home/seller/ruzhu','Home\RuzhuController');


Route::group(['prefix'=>'home','namespace'=>'Home'], function(){
    //注册
    Route::resource('register','RegisterController');
    //注册获取手机号
    Route::any('phone','RegisterController@phone');
	//给手机发短信
    Route::any('phoneto','RegisterController@phoneto');
	//我的订单
    Route::resource('myorder','MyOrderController');
	//我的账号
    Route::resource('mynumber','MyNumberController');
    //用户个人中心修改 修改密码
    Route::any('pwd','MyNumberController@pwd');
    //用户修改 头像
    Route::any('face','MyNumberController@updateface');
    //修改用户信息
    Route::any('updateper','MyNumberController@updateper');
    Route::any('mycollec','MyCollecController@mycollec');
	//首页
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
	//友情链接
	Route::resource('/admin/link','Admin\LinkController');
	//网站配置
	Route::resource('/admin/config','Admin\ConfigController');
	//修改网站配置排序
	Route::any('admin/config/changeorder','Admin\ConfigController@changeOrder');
	//网站配置内容修改路由
	Route::any('admin/config/changecontent','Admin\ConfigController@changeContent');

});


/**
 * 商家后台
 */

//登录
Route::resource('/seller/login','Seller\LoginController');
//忘记密码
Route::any('/seller/forget','Seller\ForgetController@index');
//发送邮件
Route::any('/seller/email','Seller\ForgetController@email');

//重置密码界面
Route::any('/seller/reset','Seller\ForgetController@sreset');
//密码重置逻辑路由
Route::any('/seller/dosreset','Seller\ForgetController@dosreset');


Route::group(['prefix'=>'seller','namespace'=>'Seller','middleware'=>'seller.login'], function(){
    //注册
    Route::resource('register','RegisterController');
    //退出登录
    Route::any('quit','LoginController@quit');
    //商家账号设置
    Route::resource('setup','SetupController');
     //商家个人中心
    Route::resource('personal','PersonalController');
    //商家个人中心修改
    Route::any('updateper','PersonalController@updateper');
    //商家个人中心修改 修改个人头像
    Route::any('face','PersonalController@updateface');
     //商家个人中心修改 修改密码
    Route::any('pwd','PersonalController@pwd');
    
    //商家我要开店
    Route::resource('kaidian','KaidianController');
    //商家我要开店失败后
    Route::any('xiugaikaidian','KaidianController@xiugai');
    //验证表单 修改商铺名称时 判断 除去自己是否有重名
    Route::any('updatexnameajax','KaidianController@updatexnameajax');

    //商户设置验证表单-商户名
    Route::any('exnameajax','SetupController@exnameajax');
    //商户设置验证表单-门店地址图片
    Route::any('eximageajax','SetupController@eximageajax');
    //商户设置验证表单-商户logo
    Route::any('setupajax','SetupController@setupajax');
    //商家用户个人中心
    Route::resource('index','IndexController');
    //菜品分类管理
    Route::resource('goodsclass','GoodsClassController');
    //验证表单 修改菜名是判断 除去自己是否有重名
    Route::any('gnameajax','GoodsController@gnameajax');
    //菜品管理
    Route::resource('goods','GoodsController');
    //验证上传图片
    Route::any('upload','GoodsController@upload');
    //验证商品修改
    Route::any('updateajax','GoodsController@updateajax');
    //ajax 改变商品的状态 在售->售罄
    Route::any('zaishou','GoodsController@zaishou');
    //订单管理
    Route::resource('order','OrderController');
    //评价
    Route::resource('eval','EvalController');

});




