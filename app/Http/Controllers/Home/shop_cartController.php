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
use App\Http\Model\Addr;

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
        //session测试数据
        // $uid = ['uid'=>1];
        // session(['home_user'=>$uid]);

        //获取指定id的商品信息
        $goods = Goods::where('gid',$gid)->get();
        //商品信息的一维数组 
        $goods = $goods->toArray();
        //获取当前商品id
        $gid = $goods[0]['gid'];
        //将商品id作为键
        $k[$gid] = $goods[0];
        // $goods[0];
       
        
        //当前商家id
        $sid = 'seller'.$goods[0]['sid'];
        $seller[$sid] = $k;
//  dd($seller);
        //当前用户id
        $user = 'user'.session('home_user')['uid'];
        // 获取session中之前的商品 如果没有就是空数组防止合并报错
        $sellerOld = isset(session($user)[$sid])?session($user)[$sid]:[];
        // dd($sellerOld, $seller,session($user),$request -> session() ->all());
        // 合并之前的商品
        $seller = array_merge($sellerOld, $k);
        // session(['gfee'=>$gfee]);
        session([$user=>$seller]);
        
        if(session($user)){
            return 1;
        }else{
            return 2;
        }
        // dd($goods);
        // return $goods;
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        
       $data =  $request -> session() ->all();
       dd($data);
    //    dd($data['cart1']);
       $array = [];
    //    foreach($data as $k=>$v){
    //     //    dd($v);
    //       $array['cart1'] = $v;       
    //    }
    
       foreach($data['cart1'] as $m=>$n){
        //    dd($n);
           $array[] = $n;
       }
    //    
    
    // dd($array['gname']);
        $uid = 1;
        $data = Addr::where('uid',$uid)->get();
        session(['old'=>$data]);
        // $data = $request -> session() ->all(); 
        
        // dd($data);
        return view('home.dizhi',['array'=>$array,'data'=>$data]);


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
