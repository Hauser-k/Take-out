<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
require_once app_path().'/Org/code/Code.class.php';
use App\Org\code\Code;

use Input;
use Validator;
use App\Http\Model\Seller\User;
use Illuminate\Support\Facades\Crypt;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 返回登录页面
     */
    public function getIndex()
    {
        //
        return view('seller.login'); 
    }

    /**
     * 处理验证码
     */
      //验证码
    public function code()
    {
        $code = new Code();
        $code->make();
    }

    public function postDologin(Request $request)
    {

       $input = Input::except('_token');
       
       $roles = [
            'sname' => 'required|between:6,12',
            'spwd' => 'required|between:1,12',
            'code' => 'required'
       ];
       $msg = [
            'sname.required' => '用户名必填',
            'sname.between' => '用户名长度为6-12位',
            'spwd.required' => '密码名必填',
            'spwd.between' => '用户名长度为6-12位',
            'code.required' => '验证码必填'
       ];
        $validator = Validator::make($input,$roles,$msg);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }else{
            //验证验证码
            if(strtoupper($input['code']) != session('code')){
                return back()->with('errors','验证码错误')->withInput();
            }
            //验证是否有用户
            $user = User::where('sname',$input['sname']) -> first();

            if(!$user || ($input['spwd']  != Crypt::decrypt($user->spwd)) ){
              return back()->with('errors','用户名或密码错误')->withInput();
            }
            // if($input['spwd']  != Crypt::decrypt($user->spwd)){
            //   return back()->with('errors','密码错误')->withInput();
            // }
            //将用户信息添加到session中
            session(['user'=>$user]);
            //登录
            //
            // echo 1111;
            return view('seller.index');
        }
        
    }
  
}
