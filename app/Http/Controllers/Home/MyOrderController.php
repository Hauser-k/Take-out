<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class MyOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data= DB::table('user')
            ->join('order', 'order.uid', '=', 'user.uid')
            ->join('order_goods', 'order.oid', '=', 'order.oid')
            ->join('order_dist', 'order.oid', '=', 'order_dist.oid')
            ->join('seller', 'order.sid', '=', 'seller.sid')
            ->join('seller_detail', 'order.sid', '=', 'seller_detail.sid')
            ->select('order.oid','seller_detail.extel','order.gtime','user.uname','seller.sname','order.order','order_goods.onum','order_dist.endprice','order_dist.ostatus','seller_detail.slogo','seller_detail.extel')
            ->get();



       return view('home/myorder',compact('data'));
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
        $data= DB::table('order')
            ->join('user', 'order.uid', '=', 'user.uid')
            ->join('order_goods', 'order.oid', '=', 'order.oid')
            ->join('order_dist', 'order.oid', '=', 'order_dist.oid')
            ->join('seller', 'order.sid', '=', 'seller.sid')
            ->join('seller_detail', 'order.sid', '=', 'seller_detail.sid')
            ->join('addr', 'addr.uid', '=', 'user.uid')
            ->where('order.oid',$id)
            ->select('order_dist.ofee','order_goods.gid','addr.daddr','user.uname','user.utel','seller_detail.extel','order.gtime','user.uname','seller.sname','order.order','order_goods.onum','order_dist.endprice','order_dist.ostatus','seller_detail.slogo','seller_detail.extel')
            ->first();
//        dump($data);

        $res=DB::table('order')
            ->join('seller', 'seller.sid', '=', 'order.sid')
            ->join('goods', 'seller.sid', '=', 'goods.sid')
            ->join('order_goods', 'order.oid', '=', 'order_goods.oid')
            ->where('order_goods.gid',$data['gid'])
            ->select('goods.gname','order_goods.onum','goods.gprice')
            ->get();

//        dd($res);

        return view('home/orderdateil',compact('data','res'));
    }

    /**
     * +
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
