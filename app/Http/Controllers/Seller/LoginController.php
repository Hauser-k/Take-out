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
            'sname' => 'required|unique:posts|between:6,12',
            'spwd' => 'required|between:6,12',
            'code' => 'required'
       ];
        $validator = Validator::make($input,$roles);

        if ($validator->fails()) {
            return back()->with('error');
        }else{
            //验证验证码
            if(strtoupper($input['code']) != $session('code')){
                return back() -> with('error','验证码错误');
            }
            //验证是否有用户
            $user = User::where('sname',$input['sname']) -> first();
            if(!$user){
                echo 1;
            }
        }
        
    }
  
}
