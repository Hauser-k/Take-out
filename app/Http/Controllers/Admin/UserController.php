<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function getAdd()
    {   //加载添加模板
       return view('admin.user.add');

    }

    function postInsert(Request $request)
    {


        $this->validate($request, [
            'uname' => 'required',
            'upwd' => 'required|min:5',
            'repassword' => 'required|same:upwd',
            'utel' => 'required',
            'uemail' => 'required|email',
        ],[
            'uname.required' => '用户名不能为空',
            'upwd.required' => '密码不能为空',
            'upwd.min' => '密码不能小于6位',
            'repassword.same' => '确认密码不一致',
            'utel.required' => '手机号必填',
            'uemail.required' => '邮箱必填',
            'uemail.email' => '邮箱格式不正确',
        ]);


        $data = $request->except('_token','repassword');
        $data['utime'] = time();
        $data['utoken']= str_random(50);


        $data['upwd'] = Hash::make($data['upwd']);

        $res =DB::table('user')->insert($data);

        if($res){
            return redirect('/admin/user/index') -> with('success','添加成功');
        }else{
            return back() -> with('error','添加失败');
        }
    }
    function getIndex(Request $request)
    {
        $count = $request -> input('count',10);
        $search = $request -> input('search','');
        $all = $request -> all();
        // 把所有的数据获取到 并且分页分配到主页面
        $data = DB::table('user') ->where('uname','like','%'.$search.'%')-> paginate($count);

        return view('admin.user.index',['data'=>$data,'request'=>$all]);
    }
    public function getDelete($uid)
    {

       $res = DB::table('user')->where('uid',$uid)->delete();
       if($res){
            echo'删除成功';
           return redirect('/admin/user/index') -> with('success','删除成功');
       }else{
            echo '删除失败';
            return view('/admin/user/index');
       }

    }




}
