<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\GoodsClass;
use App\Http\Model\SellerDetail;
use App\Http\Model\Order;
use App\Http\Model\Goods;
use App\Http\Model\Evals;

class shangjiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = 1;
        $re = SellerDetail::find($id);
        $or = Order::all();
        // dd($or);
        $ftime = [];
        // dd($ftime);
        $gtime = [];
        foreach($or as $k => $v){
            $ftime[] = $v['ftime'];
            $gtime[] = $v['gtime'];
        }
        // 求出数组中一共有多少条
        $a = count($ftime);
        // dd($ftime);
        $f = array_sum($ftime);
        $g = array_sum($gtime);
        // 求所有平均数
        $b = $f - $g; 
        $ptime = $b / $a;
        $data = GoodsClass::where('sid',$id)->get();
        // 获取所有的gcid
        foreach($data as $k => $v){
            $shuzu[] = $v->gcid;
        }
        // dd($shuzu);
        // 去除重复
        $shuzu = array_unique($shuzu);
        // dd($shuzu);
        // 获取在gcid内的商品值
        $good = Goods::whereIn('gcid',$shuzu)->get();
        // dd($re);
        // $seller = SellerDetail::where('sid',$id)->get();
        return view('home.shangjia',['data'=>$data,'re'=>$re,'ptime'=>$ptime,'good'=>$good]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
       return view('home.shipin');
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
        // echo 11111;
        $data = Evals::where('sid',$id)->get();
        // $a = count('eid');
        // dd($data);
        
         $re = SellerDetail::find($id);
        $or = Order::all();
        // dd($or);
        $ftime = [];
        // dd($ftime);
        $gtime = [];
        foreach($or as $k => $v){
            $ftime[] = $v['ftime'];
            $gtime[] = $v['gtime'];
        }
        // 求出数组中一共有多少条
        $a = count($ftime);
        // dd($ftime);
        $f = array_sum($ftime);
        $g = array_sum($gtime);
        // 求所有平均数
        $b = $f - $g; 
        $ptime = $b / $a;
        $data = GoodsClass::find($id);
        $goods = Goods::where('gid',$id)->get();
        return view('home.pingjia',['data'=>$data,'re'=>$re,'ptime'=>$ptime,'goods'=>$goods]);
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
