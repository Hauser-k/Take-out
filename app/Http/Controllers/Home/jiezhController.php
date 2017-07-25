<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\Http\Model\Addr;
use App\Http\Model\User;
use App\Http\Model\Goods;
use App\Http\Model\Seller;
use App\Http\Model\Order;
use App\Http\Model\OrderGoods;
use App\Http\Model\OrderDist;
use App\Http\Model\SellerDetail;
use Illuminate\Support\Facades\Session;

class jiezhController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $uid = session('home_user')['uid'];
        // dd($uid);
    //   dd($request -> except('_token'));
        // 接收传过来的gid
        $sid = $request -> except('_token')['shop_cart'];
        // dd($sid);
        // 通过gid获取sid
        // $id = Goods::where('gid',$gid['shop_cart'])->get();
        // foreach($id as $k=>$v){
        //     $sid = $v['sid'];
        // }
        // // 获取配送费
        $f = SellerDetail::where('sid',$sid)->get();
        // dd($f['ofee']);
        // dd($f);
        foreach($f as $s=>$e){
            $ofee = $e['ofee'];
        }
        // dd($ofee);
        // 将sid与gid拼接成键名
        $keylist = 'LIST:'.$uid.':'.$sid;
        $keyhash = 'HASH:'.$uid.':'.$sid.':';
        // dd($keylist);
        // dd($keyhash);
        $res = \Redis::lrange($keylist,0,-1);
        // dd($keylist);
        $n = [];
         foreach($res as $k=>$v){
                $n[$v]=\Redis::hGetAll($keyhash.$v);//获取当前用户在当前商家的所有购物车商品
            }
            // dd($n);
        // 获取session中的uid
         $uid = session('home_user')['uid'];
//         dd($uid);
        // 通过uid获取用户地址信息
        $addr = Addr::where('uid',$uid)->get();
//         dd($addr);
        // 求出不同商品的总和
        $arr = [];
        foreach($n as $q=>$w){
            $arr[] = $w['gprice']*$w['onum']; 
        }
        // 求所有的总和加上配送费
       $cou = array_sum($arr)+$ofee;
        //    dd($cou);


//        dd($da);
        // 将所有值存入session中
        session(['n'=>$n,'ofee'=>$ofee,'cou'=>$cou]);

    //    dd($addr);
        return view('home.dizhi',['addr'=>$addr,'n'=>$n,'ofee'=>$ofee,'cou'=>$cou]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jiesu(Request $request)
    {
        //通过ajax发送获取传来的所有值
        $data = $request -> all();
//        dd($data);
        // 将值存入session中
        session(['detail'=>$data]);
//         dd($data);
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
    public function Show(Request $request)
    {
        
        //获取session中的uid
        $all = $request -> session() ->all();
//         dd($all);
        foreach($all['n'] as $k=>$v){
            $sid = $v['sid'];
        }

        $na = Seller::where('sid',$sid)->get();
        foreach($na as $a=>$b){
           $sname = $b['sname'];
        }
        $da = date('Ymd').rand(1000,4);
        session(['da'=>$da]);
        // dd($na);
        $uid = $request -> session() -> get('user_home');
        // dd($uid);
        // 通过uid查出用户余额
        $data = User::where('uid',$uid)->get();


        return view('home.jiezhang',['data'=>$data,'sname'=>$sname,'all'=>$all,'da'=>$da]);
    }


    public function Wan(Request $request)
    {
        $re = $request -> session() ->all();
        // dd($re);
        $sid = $re['seller_detail']['sid'];

        //获取所选地址的id

        $e = $re['seller_detail']['sdid'];
//        dd($e);

        $uid = $re['home_user']['uid'];
        // 获取当前实间
        $da = time();
        // 订单号
        $order = $re['da'];
        // dd($order);
        $ofee = $re['ofee']; 
        // 获取总价
        $pri = $re['cou'];
        // $or = Order::get();
        // 向order表中插入数据
       Order::create(['order'=>$order,'uid'=>$uid,'sid'=>$sid,'otime'=>$da]);
       // 获取刚刚插入的oid
       $oid = Order::where('order',$order)->get();
       // 获取oid
        $id = $oid[0]->oid;
        foreach($re['n'] as $k=>$v){
            $sid = $v['sid'];
            $gid = $v['gid'];
            $onum = $v['onum'];
            $tatse = $v['gtaste'];
            // dd($re['gprice']);
            $price = $v['gprice'];
            OrderGoods::insert(['gid'=>$gid,'onum'=>$onum,'oprice'=>$price,'otaste'=>$tatse,'ofee'=>$ofee,'sid'=>$sid,'oid'=>$id]);

        }
//         dd($did);      
//        dd($oid);
        OrderDist::insert(['oid'=>$id,'did'=>$e,'umsg'=>'标准','uway'=>'余额支付','ostatus'=>2,'endprice'=>$pri,'ofee'=>$ofee]);
echo '<script>alert("添加成功")</script>';
        return redirect('home/index');
    }


 
}
