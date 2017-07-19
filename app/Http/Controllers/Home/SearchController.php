<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\SellerDetail;
use App\Http\Model\Seller;
use App\Http\Model\goods;

class SearchController extends Controller
{
    public function dian(Request $request)
    {   
        $inp = $request['inp'];
        //每家商店每月的总销量 获取前三十天的时间戳
        // $time = strtotime(date('Y-m-d H:i:s',strtotime('-30 days')));
        
     
        $data = SellerDetail::join('seller','seller_detail.sid','=','seller.sid')
           ->where('seller_detail.exname','like','%'.$inp.'%')
           ->paginate(5);
        // dd($data);
        // 判断有没有搜到结果
        if(count($data)<1){
            return view('home.sousuokong',compact('inp'));
        }
        return view('home.sousuo-php',compact('inp','data'));
    }
    public function caidan(Request $request)
    {   
        $inp = $request['inp'];

       //获取搜索名字 的全部商品
        $da = Goods::where('gname','like','%'.$inp.'%')->get();
        // dd($da);
        // 判断有没有搜到结果
        if(count($da)<1){
            return view('home.sousuokong',compact('inp'));
        }
        
        foreach($da as $k=>$v){
            //将相同sid的商品放到一个二维数组中,
            $data[][$v->sid] = $v;
            //将sid放到一个数组中
            $shuzu[] = $v->sid;
        }
        // dd($data);
        //对sid数组 去重
        $shuzu = array_unique($shuzu);
       
        //查询表 符合sid数组中的值
        $seller = SellerDetail::join('seller','seller_detail.sid','=','seller.sid')
           ->whereIn('seller_detail.sid',$shuzu)->get();
        // dd($seller);
        return view('home.sousuo',compact('inp','data','seller'));
    }
}
