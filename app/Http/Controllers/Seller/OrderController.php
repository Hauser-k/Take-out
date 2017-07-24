<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Order;
use App\Http\Model\OrderGoods;
use App\Http\Model\OrderDist;
use App\Http\Model\Goods;
use App\Http\Model\Addr;
use Input;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $sid = session('seller_user')->sid;
        
        $count = $request -> input('count',2);
        $wh = [];
        if($request->has('ostatus')){
            $wh['ostatus'] = $request['ostatus'];
        }
        if($request->has('keywords')){
            $wh['order'] = $request['keywords'];
        }
        $data = Order::join('order_dist','order.oid','=','order_dist.oid')->where('sid',$sid)->where($wh)->orderBy('otime','desc')->paginate($count);
         // dd($data);
        $arr = ['2'=>'付款未接单','3'=>'商家已接单','4'=>'已配送','5'=>'已收货未评价','6'=>'收货已评价','7'=>'取消订单'];
        return view('seller.order.order',compact('data','count','arr'));
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // dd($id);
        $data = Goods::join('order_goods','order_goods.gid','=','goods.gid')->where('oid',$id)->paginate(2);
        // dd($data);
        return view('seller.order.order-goods',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        // $id = 1;
        // 下边这条是对的
        $data = OrderDist::join('addr','order_dist.did','=','addr.did')->where('oid',$id)->first();
        // $data = OrderDist::join('addr','order_dist.did','=','addr.did')->where('addr.did',1)->first();
        return view('seller.order.order-user',compact('data'));
       
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
        
        //修改order_dist 的字段
        $order_dist = $request->only('umsg','ostatus');
        //修改addr 的字段
        $did = Input::get('did');
        $addr = $request->only('dname','dtel','daddr');
        //修改数据库
        
        $re = OrderDist::where('oid',$id)->update($order_dist);
        // dd($id);
        $re1 = Addr::where('did',$did)->update($addr);
        //判断接单时间是否为0 是默认值0 则修改数据库 否则不修改
        $gtime = Order::where('oid',$id)->get();
        //修改接单时间
        if((Input::get('ostatus') == 3) && ($gtime[0]->gtime ==0)){

            Order::where('oid',$id)->update(['gtime'=> time()]);
        }
        // if($re && $re1){
            return redirect('/seller/order');
        // }else{  
        //     return back()->with('error','提交失败');
        // }
        // $request   
    }

    
}
