<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Input;
use Validator;
use App\Http\Model\Seller;
use App\Http\Model\SellerDetail;
use Illuminate\Support\Facades\Crypt;
//引用对应的命名空间
use Gregwar\Captcha\CaptchaBuilder;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 返回登录页面
     */
    public function index()
    {
        //
        return view('seller.login'); 
    }
    
    /**
     * 处理登录信息
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
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
            if(strtoupper($input['code']) != strtoupper(session('code'))){
                return back()->with('errors','验证码错误')->withInput();
            }
            //验证是否有用户
            $user = Seller::where('sname',$input['sname']) -> first();
            
            // if(!$user || ($input['spwd']  != Crypt::decrypt($user->spwd)) ){
            if(!$user || ($input['spwd']  != ($user->spwd)) ){
              return back()->with('errors','用户名或密码错误')->withInput();
            }
            
            //将用户信息添加到session中
            session(['seller_user'=>$user]);
            //商家详细信息
            $seller_detail = SellerDetail::where('sid',$user->sid)->first();
            // 将商家详情表存到session中
            session(['seller_detail'=>$seller_detail]);
            //如果选中 记住密码 将信息保存到cookie中
            if($request->input('name')){
                Cookie::make('xinxi', $user, 60000);
            }
            return view('seller.index');
        }
        
    }
    // 退出
   //退出登录
    public function quit()
    {
    // 清空session
        session(['user'=>null]);
        return redirect('/seller/login');
    }
   
  
}
