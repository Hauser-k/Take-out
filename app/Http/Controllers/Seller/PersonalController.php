<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Seller;
use App\Http\Model\SellerDetail;
use Input;
use Crypt;
use Validator;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $sid = session('seller_user')->sid;
        $data = Seller::where('sid',$sid)->get();
        $data = $data->toArray();
        // dd($data);
        // 获得图片
        $pic = SellerDetail::where('sid',$sid)->first()->slogo;
        return view('seller.personal.index',compact('data','pic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateper(Request $request)
    {   
        //ajax传过来的值
        $msg = $request->input('msg');
        $type = $request->input('type');
        //session中的用户名
        $sid = session('seller_user')->sid;
        if(trim($type) == 'tel'){
            $tel = Seller::where('sid','not like',$sid)->where('stel',$msg) -> count();
            // return $tel;
            if($tel != 0) 
                return ['status' => 1,'msg' => '手机号码已存在...'];
            // if(session('seller_user')->stel == $msg)
            //     return [
            //         'status'=>500
            //     ];

            $re = Seller::find($sid)->update(['stel'=>$msg]);

            if($re){
                return ['status'=>0,'msg'=> '修改成功'];
            } else {
                return ['status'=>1,'msg'=> '修改失败'];
            }
        }else{
            $email = Seller::where('sid','not like',$sid)->where('semail',$msg) -> count();
            if($email){
                return ['status' => 1,'msg' => '该邮箱已存在'];
            }
            // if(session('seller_user')->semail == $msg){
            //     return [
            //         'status'=>500
            //     ];
            // } 
            $re = Seller::find($sid)->update(['semail'=>$msg]);
            if($re){
                return ['status'=>0,'msg'=>'修改成功'];
            }else{
                return ['status'=>1,'msg'=>'修改失败'];
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return 修改个人头像(商家logo)
     */
     public function updateface()
    {

        //将上传文件移动到制定目录，并以新文件名命名
        $file = Input::file('file_upload');
        if($file->isValid()) {
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;

        //将图片上传到本地服务器
            $path = $file->move(public_path().'/uploads/',$newName);
        //返回文件的上传路径
            $filepath = $newName;
        //修改数据库
            $sid = session('seller_user')->sid;
            $data = SellerDetail::where('sid',$sid)->update(['slogo'=>$newName]);
            return $newName;
        }
    }
   
   
    public function edit($id)
    {
        $data = Seller::where('sid',$id)->first();
       // dd($seller);
        return view('seller.personal.updatespwd',compact('data'));
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
        $input = Input::except('_token','_method','sid');
       
        $roles = [
            'yspwd' => 'required|between:6,18',
            'newspwd' => 'required|between:6,18',
            'respwd' => 'required|between:6,18|same:newspwd'
        ];
        $msg = [
            'yspwd.required' => '原始密码必填',
            'yspwd.between' => '原始密码为6-18位',
            'newspwd.required' => '新密码必填',
            'newspwd.between' => '新密码长度为6-18位',
            'respwd.required' => '确认密码必填',
            'respwd.between' => '确认密码长度为6-18位',
            'respwd.same' => '确认密码与新密码不一致'
        ];
        $validator = Validator::make($input,$roles,$msg);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }else{
            $pwd = Crypt::encrypt($request['newspwd']);
            $re = Seller::where('sid',$id)->update(['spwd'=>$pwd]);
            if($re){
                return redirect('seller/login');
            }else{
                return back()->withErrors($validator); 
            }
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return 商户中心修改密码 验证原始密码
     */
    public function pwd(Request $request)
    {
        $pwd = $request->Input('inp');
        $sid = $request->Input('hid');

        $seller_user = Seller::where('sid',$sid)->first();
        // dd($seller_user['spwd']);
        if((Crypt::decrypt($seller_user['spwd'])) != $pwd){
            return ['status'=>0,'msg'=>'输入的原始密码错误'];
        }else{
            return ['status'=>1,'msg'=>' '];
        }
    }
}
 