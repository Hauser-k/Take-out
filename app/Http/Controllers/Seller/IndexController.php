<?php

namespace App\Http\Controllers\Seller;

use App\Http\Model\Seller;
use App\Http\Model\SellerDetail;
use Illuminate\Http\Request;
use Validator;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!session()->has('seller_user') && !session()->has('seller_detail')){
            return view('seller.login');
        };
        
        $sid = session('seller_user')->sid;
        $user = Seller::where('sid',$sid)->first();
        //判断商家状态 是否通过
        if($user->status == 1){
            return view('seller.kaidian.success');
        }else if($user->status == 3){
            $sid = $user->sid;
            return view('seller.kaidian.false',compact('sid'));
        }else if($user->status == 5){
            return redirect('/seller/kaidian');
        }
       
        //商家详细信息
        $seller_detail = SellerDetail::where('sid',$sid)->first();
         //得到 商家的slogo
        $pic = $seller_detail->slogo;
        // 将商家详情表存到session中
        session(['seller_detail'=>$seller_detail]);
        return view('seller.index',compact('pic'));
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
        $seller = Seller::where('sid',$id)->first();
        $sellerdetail = SellerDetail::where('sid',$id)->first();
//        dd($seller);
        return view('seller/information/index',['seller'=>$seller,'sellerdetail'=>$sellerdetail]);
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
//        $s = $request->except(['_method']);
//        dd($s);
        $input =  $request->except(['_token','_method','status']);
        $input1 = $request->only(['status']);

//        $input['sid'] = 1;
//       dd($input);
//       dd($input1);
        //验证规则
        if($input['etime']<=$input['stime']){
            return back()->with('error','结束时间不可以小于或等于开始时间');
        }
        $role =[
            'stime'=>'required|integer|min:0|max:23',
            'etime'=>'required|integer|min:1|max:24',
            'extel'=>'required|numeric|regex:[^1\d{10}$]'
        ];
//       提示信息
        $mess=[
            'stime.required'=>'开始时间不可为空',
            'stime.integer'=>'开始时间必须是整数',
            'stime.min'=>'开始时间不可以小于0',
            'stime.max'=>'开始时间不可大于23',
            'etime.required'=>'结束时间不可为空',
            'etime.integer'=>'结束时间必须是整数',
            'etime.min'=>'结束时间不可以小于1',
            'etime.max'=>'结束时间不可大于24',
            'extel.required'=>'手机号码不可为空',
            'extel.numeric'=>'手机号码必须是数值',
            'extel.regex'=>'输入的不是手机号码',
        ];
//       表单验证
        $validator =  Validator::make($input,$role,$mess);
        if($validator->passes()){
//

//
//dd(session('seller_user'));
            if(session('seller_user')['status'] != $input1['status']){
                $res = Seller::where('sid',$id)->update($input1);
//                dd($res);
                if($res){
                    //清空session，然后给session重新赋值
                    $request->session()->forget('seller_user');
                    $user = Seller::where('sid',$id) -> first();
                    session(['seller_user'=>$user]);
                    //返回到我的店铺
                    return redirect('seller/index/'.$id.'/edit')->with('success','修改成功');
                }else{
                    return back()->with('error','修改失败');
                }
            }
            $re = SellerDetail::where('sid',$id)->update($input);
            if($re){
                session(['seller_detail'=>$re]);
                return redirect('seller/index/'.$id.'/edit')->with('success','修改成功');
            }else{
                return back()->with('error','没有修改');
            }
        }else{
//          如果没有通过表单验证
            return back()->withErrors($validator);
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
