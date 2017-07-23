<?php

namespace App\Http\Controllers\home;

use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Validator;
class MyNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = User::where('uid',session('home_user')['uid'])->get();
        $data = $data->toArray();

        // 获得图片
        $pic = User::find(session('home_user')['uid'])->uface;

        return view('home/mynumber',compact('data','pic'));


    }

    public function updateper(Request $request)
    {

        //ajax传过来的值
        $msg = $request->input('msg');


        $type = $request->input('type');
        //session中的用户名
        $uid = session('home_user')['uid'];
        if(trim($type) == 'tel'){
            $tel = User::where('uid','not like',$uid)->where('utel',$msg) -> count();
            // return $tel;
            if($tel != 0)
                return ['status' => 1,'msg' => '手机号码已存在...'];
            if(session('home_user')['utel'] == $msg)
                return [
                    'status'=>500
                ];

            $re = User::find($uid)->update(['utel'=>$msg]);

            if($re){
                return ['status'=>0,'msg'=> '修改成功'];
            } else {
                return ['status'=>1,'msg'=> '修改失败'];
            }
        }
    }


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
            $uid = session('home_user')['uid'];
            $data = User::where('uid',$uid)->update(['uface'=>$newName]);
            return $newName;
        }
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = User::where('uid',$id)->first();
        // dd($seller);
        return view('home/myupwd',compact('data'));

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
//        dd(Input::all());

        $input = Input::except('_token','_method','uid');

        $roles = [
            'yupwd' => 'required|between:6,18',
            'newspwd' => 'required|between:6,18',
            'respwd' => 'required|between:6,18|same:newspwd'
        ];
        $msg = [
            'yupwd.required' => '原始密码必填',
            'yupwd.between' => '原始密码为6-18位',
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

            $re = User::where('uid',$id)->update(['upwd'=>$pwd]);
            if($re){
                return redirect('home/mynumber');
            }else{
                return back()->withErrors($validator);
            }
        }

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return 用户中心修改密码 验证原始密码
     */
    public function pwd(Request $request)
    {



        $pwd = $request->Input('inp');

        $uid = $request->Input('hid');

        $user = User::where('uid',$uid)->first();


        if((Crypt::decrypt($user['upwd'])) != $pwd){
            return ['status'=>0,'msg'=>'输入的原始密码错误'];
        }else{
            return ['status'=>1,'msg'=>' '];
        }
    }

}
