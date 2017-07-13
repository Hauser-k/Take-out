<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Seller;
use Mail;
use Input;
use Validator;
use Crypt;


class ForgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('seller.mail.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return 发送邮件
     */
    public function email(Request $request)
    {
          
        $email = trim($request['email']);
        // return $data = $value->sid;
        
        $user =  Seller::where('semail',$email)->first();
        //0表示成功 其他表示失败
        // return $data = $re;
        if(!$user){
            $data = 1;
            return $data;
        }else{
            Mail::send('seller.mail.forget', ['user' => $user], function ($m) use ($user) {
//                to(收件人的邮箱，收件人的名字)
                $m->to($user->semail, $user->sname)->subject('找回密码!');
            });
      
        }
        return $data=0;
    }

    public function store()
    {

    }
  
     //重置密码界面
    public function sreset(Request $request)
    {   

//        根据id 获取要重置密码的用户
        $user = Seller::find($request->input('sid'));
      
//        重置密码页面
        return view('seller.mail.reset',compact('user'));
    }

    //处理重置密码
    public function dosreset(Request $request)
    {
        // dd($request->all());
         // dd(1);
       $input = Input::except('_token');
       $roles = [
            'spwd' => 'required|between:6,18',
            'respwd' => 'required|between:6,18|same:spwd'
       ];
       $msg = [
            'spwd.required' => '密码必填',
            'spwd.between' => '密码长度为6-18位',
            'respwd.required' => '确认密码必填',
            'respwd.between' => '确认密码长度为6-18位',
            'respwd.same' => '密码不一致'
       ];
        $validator = Validator::make($input,$roles,$msg);

        if ($validator->fails()) {

            return back()->withErrors($validator);
        }else{

            $sid = $request->input('sid');
            $spwd = Crypt::encrypt($input['spwd']);

            $re =  Seller::where('sid',$sid)->update(['spwd'=>$spwd]);


            if($re){
                return redirect('/seller/login');
            }else{
                echo "修改失败";
            }
        }
    }
}
