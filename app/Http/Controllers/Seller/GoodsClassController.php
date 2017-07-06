<?php

namespace App\Http\Controllers\Seller;

use App\Http\Model\GoodsClass;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class GoodsClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        如果请求携带keywords参数说明是通过查询进入index方法的，否则是通过用户列表导航进入的
        if($request->has('keywords')){
            $key = trim($request->input('keywords')) ;
            $user = GoodsClass::where('cname','like',"%".$key."%")->paginate(5);
//            dd($user);
            return view('seller/goodsclass/goodsclass',['cate'=>$user,'key'=>$key]);
        }else{
//            return 22222;
            //查询出user表的所有数据
            $user =  GoodsClass::orderBy('gcid','asc')->paginate(5);
            //      向前台模板传变量的第一种方法
            return view('seller/goodsclass/goodsclass',['cate'=>$user]);
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
        return view('seller/goodsclass/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $input = Input::except('_token');
        $input['sid'] = 1;
//        dd($input);
//        添加的第二种方式

        //验证规则
        $role =[
            'cname'=>'required|max:6'
        ];
//       提示信息
        $mess=[
            'cname.required'=>'必须输入分类名',
            'cname.max'=>'用户名长度必须在6位之内'
        ];
//       表单验证
        $validator =  Validator::make($input,$role,$mess);

        if($validator->passes()){
            $re = GoodsClass::create($input);
            if($re){
                return redirect('seller/goodsclass');
            }else{
                return back()->with('error','添加失败');
            }
        }else{
//          如果没有通过表单验证
            return back()->withErrors($validator);
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
        // 取回符合查找限制的第一个模型 ...
        $date = GoodsClass::where('gcid', $id)->first();
        // 通过主键取回一个模型...
//        $cate = GoodsClass::find($id);
        return view('seller/goodsclass/edit',compact('date'));
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
//        dd($request->all());
        $input =  $request->except(['_token',"_method"]);

        $re = GoodsClass::where('gcid',$id)->update($input);
//        更新是否成功
        if($re){
//            如果成功，返回到用户列表页
            return redirect('seller/goodsclass');
        }else{
//            如果失败，返回去
            return back()->with('errors',"修改失败");
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
        //删除对应id的用户
        $re =  GoodsClass::where('gcid',$id)->delete();
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
