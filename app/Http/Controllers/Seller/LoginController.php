<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
require_once app_path().'/Org/code/Code.class.php';
use App\Org\code\Code;

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
  
}
