<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @author 海涛
     */
    public function index(Request $request)
    {
        //
        $count = $request -> input('count',10);
        $search = $request -> input('search','');
        $all = $request -> all();

        // 把所有的数据获取到 并且分页分配到主页面
        $data = User::where('uname','like','%'.$search.'%')-> paginate($count);

        return view('admin.user.index',['data'=>$data,'request'=>$all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/user/add');
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
        $this->validate($request, [
            'uname' => 'required',
            'upwd' => 'required|min:6',
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


        $data['upwd'] = Crypt::encrypt($data['upwd']);

        $res =User::insert($data);

        if($res){
            return redirect('/admin/user/') -> with('success','添加成功');
        }else{
            return back() -> with('error','添加失败');
        }
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
    public function edit($uid)
    {
        $data = User::where('uid',$uid)->first();
        return view('admin.user.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       // dd($request->all());

        //去除_token
        $all = $request->except(['_token','_method']);

        $res = User::where('uid',$id)->update($all);
        if($res){
        //  如果添加成功跳转到分类列表页
            return redirect('admin/user');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     */
    public function destroy($id)
    {
        $re =  User::where('uid',$id)->delete();
//       0表示成功 其他表示失败
        if($re){
            $data = [
                'status'=>0,
                'msg'=>'删除成功！'
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'删除失败！'
            ];
        }
        return $data;
    }


}
