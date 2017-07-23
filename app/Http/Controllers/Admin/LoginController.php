<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Contracts\Encryption\DecryptException;
//引用对应的命名空间
use Gregwar\Captcha\CaptchaBuilder;
use Session;


use Crypt;

class LoginController extends Controller
{   
    // login加载登录页面
    public function index()
    {

        return view('admin.login.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    //验证登录
    public function store(Request $request)
    {   

        //验证码
        $code = session('code');


        $code2 = $request -> input('code');
        
        if($code != $code2){
            return back() -> with('error','验证码错误');
            exit;
        }
    	//1.处理登录
    	$data = ($request->except('_token','code'));
    	//2.查询
    	$res = Admin::where('aname',$data['username'])->first();

        // dd($res);

    	// dd(Crypt::encrypt('666'));

    	if(!$res){
    		return back() -> with('error','用户不存在');
    	}else{
    		// $res['apwd']; 用户的密码
    		// $data['password']; 输入密码
    		 $password = Crypt::decrypt($res['apwd']);

    		 if($password == $data['password']){
                //添加session
                session(['admin_user'=>$res]);

    		     return redirect('admin/user');


             }else{
    		 	return back() -> with('error','用户名或密码错误');
    		 }
    	}
    	//2.跳转到后台

    }

    public function show(Request $request)
    {
        //

        if($request){

            $request->session()->forget('admin_user');
            echo "退出成功";
            return redirect('admin/login');

        }else {
            echo "退出失败";
            return back() -> with('error','退出失败');
        }

    }
   
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
