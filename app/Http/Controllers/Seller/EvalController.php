<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Evals;
use Session;
use Input;
use Admin;
use App\Http\Model\OrderGoods;

class EvalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // dd($request->all());
        
        //获取session中的值 json格式的
        $value = Input::session()->get('user');
        //通过$value->sid筛选到本用户登录评价信息
        $data = Evals::where('sid',$value->sid)->orderBy('etime','desc')->paginate(2);

        return view('seller.eval.eval',['data'=>$data]);
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
     * @return 详细订单
     */
    public function show($oid)
    {
      
       //查询
        dd(1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //当前评价信息
        $data = Evals::find($id);
        // dd($data->uid);
        return view('seller.eval.edit',['data'=>$data]);
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
        //找到这条数据
      
       $input =  $request->except(['_token',"_method"]);

       $re = Evals::where('eid',$id)->update($input);
       // $data = Evals::find($id);
        if($re){
        //如果回复成功
            return redirect('seller/eval');
        }else{
            return back()->with('error','回复失败')->withInput();
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
}
