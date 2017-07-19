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
use App\Http\Model\Cart;


class Shop_cartController extends Controller
{

    /*
     * 添加到购物车
     */
   public  function addcart(Request $request)
   {
        // $uid = session(['home_user'])->uid;
        $gid = $request -> all();
        // dd($gid);
        $goods = Goods::where('gid',$gid)->get();
        // session(['gfee'=>$gfee]);
        session(['cart1'=>$goods]);
        // dd($goods);
        return $goods;
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $data =  $request -> session() ->all();
    //    dd($data);
       $array = [];
       foreach($data as $k=>$v){
        //    dd($v);
          $array = $v;       
       }
       foreach($array as $m=>$n){
        //    dd($n);
       }
    //    dd($array);
        return view('home.dizhi',['array'=>$array]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('home.jiezhang');
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



    /*
     * 购物车列表
     */

    public function cart()
    {
       
    }

    /*
     * 删除购物车里的某一件商品
     */
    public  function  getRemovecart($rowId)
    {
     
    }


    /*
     * 清空购物车
     */
    public function destroy()
    {

      
    }
}
