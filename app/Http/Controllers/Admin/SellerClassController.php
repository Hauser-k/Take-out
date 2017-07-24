<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\SellerClass;
class SellerClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    
         // $arr = $request -> all();
        // dd($arr);
        
         $count = $request -> input('count',10);
         $search = $request -> input('search','');
         $data = SellerClass::where('csname','like','%'.$search.'%')->paginate($count);
        // dd($data);
          return view('admin.sellerclass.index',['data'=>$data,'count'=>$count,'search'=>$search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/sellerclass/add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $input = Input::except('_token');

        // dd($input);
        // $res = SellerClass::where('csname',$input['csname'])->first();
       
       // dd($res);
        // dd($name);
       if(empty($input['csname'])){
            return back() -> with('error','名称不能为空');
        }   
              $res = SellerClass::where('csname',$input['csname'])->first();
            if(!$res==$input['csname']){
                  $re = SellerClass::create($input);
                  return redirect('/admin/sellerclass/create') -> with('success','添加成功');
        }else{
            return back()->with('error','用户已存在');

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
        //找到要修改的用户信息 传给修改列表
        $data = SellerClass::where('csid',$id)->first();
        return view('admin/sellerclass/edit',compact('data'));
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
        // dd($request->all());
        $input = $request->except(['_token',"_method"]);
        $re = SellerClass::where('csid',$id)->update($input);
        if($re){
            return redirect('admin/sellerclass');
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
        $re = SellerClass::where('csid',$id)->delete();

        if($re){
            $data = [
                'status'=>0,
                'msg'=>'删除成功'
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'删除失败'
            ];
        }
        return $data;
    }
}
