<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取 的每页多少条


        $count = $request -> input('count',10);

        $search = $request -> input('search','');

        $all = $request -> all();

        // 把所有的数据获取到 并且分页分配到主页面
        $data = Admin::where('aname','like','%'.$search.'%')-> paginate($count);

        return view('admin.adminuser.index',['data'=>$data,'request'=>$all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/adminuser/add');
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
            'aname' => 'required',
            'apwd' => 'required|min:6',
            'repassword' => 'required|same:apwd',

        ],[
            'aname.required' => '用户名不能为空',
            'apwd.required' => '密码不能为空',
            'apwd.min' => '密码不能小于6位',
            'repassword.same' => '确认密码不一致',


        ]);


        $data = $request->except('_token','repassword');
        $data['atime'] = time();



        $data['apwd'] = Crypt::encrypt($data['apwd']);

        $res =Admin::insert($data);

        if($res){
            return redirect('/admin/adminuser/') -> with('success','添加成功');
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
    public function edit($id)
    {
        //
        $data = Admin::where('aid',$id)->first();
        return view('admin.adminuser.edit',compact('data'));


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
        //
        $all = $request->except(['_token','_method']);

        $res = Admin::where('aid',$id)->update($all);

        if($res){
            //  如果添加成功跳转到分类列表页
            return redirect('admin/adminuser');
        }else{
            return back()->with('error','修改失败');
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
        $re =  Admin::where('aid',$id)->delete();
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
