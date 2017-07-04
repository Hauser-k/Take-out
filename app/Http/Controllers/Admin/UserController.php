<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
{
    function getAdd()
    {   //加载添加模板
       return view('admin.user.add');

    }

    function postInsert(Request $request)
    {
        $data = $request->except('_token','repassword');
        $data['utime'] = time();
        $data['utoken']= str_random(50);
//          Validator::make($data, [
//            'uemail' => 'required|email',
//
//        ]);



        $res =DB::table('user')->insert($data);

        if($res){
            return redirect('/admin/user/index') -> with('success','添加成功');
        }else{
            return back() -> with('error','添加失败');
        }
    }
    function getIndex()
    {
        echo 'a';
    }




}
