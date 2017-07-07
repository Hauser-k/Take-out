<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Order;
use App\Http\Model\User;
use App\Http\Model\OrderGoods;
use App\Http\Model\OrderDist;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       

        $wh = [];
        if($request->has('search1')){
            $wh['uname'] = $request['search1'];
       }
       if($request->has('search2')){
            $wh['gname'] = $request['search2'];
       }

        $count = $request -> input('count',2);
         $data = Order::join('seller','order.sid','=','seller.sid')->join('user','order.uid','=','user.uid')->where($wh)->paginate($count);
        

        return view('admin.order.index',['data'=>$data,'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $re = OrderDist::join('order','order_dist.oid','=','order.oid')->join('addr','order_dist.did','=','addr.did')->get();
       
         $wh = [];
        if($request->has('search1')){
            $wh['uid'] = $request['search1'];
       }
       if($request->has('search2')){
            $wh['gid'] = $request['search2'];
       }

        $count = $request -> input('count',2);
       
        $data = OrderDist::join('order','order_dist.oid','=','order.oid')->join('addr','order_dist.did','=','addr.did')->where($wh)->paginate($count);

        return view('admin.order.create',['data'=>$data,'count'=>$count]);

    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        

        $re = OrderGoods::join('order','order.oid','=','order_goods.oid')->join('goods','order_goods.gid','=','goods.gid')->get();
        // dd($re);
         $wh = [];
        
        if($request->has('search1')){
            $wh['uid'] = $request['search1'];
       }
       if($request->has('search2')){
            $wh['gid'] = $request['search2'];
       }

        $count = $request -> input('count',2);

        $data = OrderGoods::join('order','order.oid','=','order_goods.oid')->join('goods','order_goods.gid','=','goods.gid')->where($wh)->paginate($count);

        return view('admin.order.show',['data'=>$data,'count'=>$count]);
    }

    

   
}
