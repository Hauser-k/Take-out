<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Contracts\Encryption\DecryptException;

use Crypt;

class LoginController extends Controller
{   
    // login加载登录页面
    public function getLogin()
    {

        return view('admin.login.login');
    }

    //验证登录
    public function postDologin(Request $request)
    {
    	//1.处理登录
    	$data = ($request->except('_token'));

    	//2.查询
    	$res = DB::table('admin')->where('aname',$data['username'])->first();

    	// dd(Crypt::encrypt('666'));

    	if(!$res){
    		echo '用户不存在';
    	}else{
    		// $res['apwd']; 用户的密码
    		// $data['password']; 输入密码
    		 $password = Crypt::decrypt($res['apwd']);
    		 if($password = $data['password']){
    		 	echo '登录';
    		 }else{
    		 	echo '密码错误';
    		 }
    	}
    	//2.跳转到后台

    }
}
