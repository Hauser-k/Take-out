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
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class shangjiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //商家详情页
    public function getIndex($sid)
    {
//        dd($id);
        $user = ['uid'=>2];
        session(['home_user'=>$user]);
//        session(['uid'=>3]);
        $re = SellerDetail::find($sid);

        $data = GoodsClass::where('sid',$sid)->get();
        // 获取所有的gcid
        foreach($data as $k => $v){
            $shuzu[] = $v->gcid;
        }

        $shuzu = array_unique($shuzu);
        // dd($shuzu);
        // 获取在gcid内的商品值
        $good = Goods::whereIn('gcid',$shuzu)->get();

//        \Redis::flushall();

//        $res = \Redis::keys('*');//获取键名
//        dd($good);
        $cart = $this->cart_list($sid);
//        dd($cart);
//        dd($cart[1]);
//        dd($re['sid']);
        return view('home.shangjia',['data'=>$data,'re'=>$re,'good'=>$good,'cart'=>$cart[2],'other'=>$cart[1]]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shipin($id)
    {
        //
       return view('home.shipin');
    }



    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Pingjia()
    {   
        $id = 1;
        $data = Evals::where('sid',$id)->get();

         $re = SellerDetail::find($id);

        $data = GoodsClass::find($id);
        $goods = Goods::where('gid',$id)->get();
        return view('home.pingjia',['data'=>$data,'re'=>$re,'goods'=>$goods]);
    }

    //增加购物车商品
    public function getAddcart(Request $request){
//        商品id
        $gid = $request['gid'];
//        用户id
        $uid = session('home_user')['uid'];
//        当前商品
        $goods = Goods::where('gid',$gid)->get()->toArray()[0];
        $goods['onum'] = 1;
//        商家id
        $sid = $goods['sid'];

//        利用队列里的值来做需要取数据的唯一索引，利用哈希的key的后缀名做原型数据的唯一索引
        $keylist = 'LIST:'.$uid.':'.$sid;
        $keyhash = 'HASH:'.$uid.':'.$sid.':'.$gid;


//       直接从redis中取值
//       1. 判断当前商品是否存在redis中
//        $res = \Redis::hexists($keyhash,'gid');//检测哈希下是否存在该键名
        $res = \Redis::exists($keyhash);//检测键名是否设置

//        dd($sid);
//        if($res){
//            return 1;
//        }else{
//            return 2;
//        }
//die;
//        dd($res);
        if(!empty($uid) && !empty($gid) && !empty($sid)) {
            //不存在 增加商品
            if (!$res) {
//               2.1 将每条数据的id存入list
                $add_return1 = \Redis::rpush($keylist,$gid);
//               2.2 将每条记录的id作为hash的键，记录值作为hash的值
                $add_return = \Redis::hmset($keyhash,$goods);

                if($add_return && $add_return1) {
                    $cart = $this->cart_list($sid);
//                    dd($cart);
                    return self::ajaxReturn(array('code'=>1,'msg'=>'success','cart'=>$cart[2],'other'=>$cart[1]));
                }else {
                    return self::ajaxReturn(array('code'=>2,'msg'=>'error'));
                }
            //存在的商品增加1
            }elseif($res) {
                $add_exist_result=\Redis::hIncrBy($keyhash,'onum',1);
                $cart = $this->cart_list($sid);
                if($add_exist_result) {
                    return self::ajaxReturn(array('code'=>3,'msg'=>'success','gid'=>$gid,'onum'=>$add_exist_result,'other'=>$cart[1]));
                }else {
                    return self::ajaxReturn(array('code' =>2, 'msg' => 'error'));
                }
            }
        }
    }
    //减少购物车的商品
    public function getReducegoods(Request $request)
    {
        //        商品id
        $gid = $request['gid'];
//        用户id
        $uid = session('home_user')['uid'];
//        当前商品
        $goods = Goods::where('gid',$gid)->get()->toArray()[0];
//        $goods_key = array_keys($goods);
//        $goods['onum'] = 1;
//        商家id
        $sid = $goods['sid'];

//        利用队列里的值来做需要取数据的唯一索引，利用哈希的key的后缀名做原型数据的唯一索引
        $keylist = 'LIST:'.$uid.':'.$sid;
        $keyhash = 'HASH:'.$uid.':'.$sid.':'.$gid;


//       直接从redis中取值
//       1. 判断当前商品是否存在redis中
//        $res = \Redis::hexists($keyhash,'gid');//检测哈希下是否存在该键名
        $res = \Redis::exists($keyhash);//检测键名是否设置


        if(!empty($uid) && !empty($gid) && !empty($sid)) {
            //不存在 返回提示
            if (!$res) {
                return self::ajaxReturn(array('code'=>2,'msg'=>'no exist'));
            }elseif($res) {
                $val=\Redis::hGet($keyhash,'onum');
//                dd($val);
                if($val <= 1) {//购物车商品只有一件的时候 减少到0就是删除
                    $del_result1 = \Redis::Del($keyhash);//删除指定商品
                    $del_result = \Redis::Lrem($keylist,0,$gid);//移出链表的当前商品id
//                    var_dump($del_result1);
//                    $res = \Redis::lrange($keylist,0,-1);//获取链表中一段的值
//                    var_dump($res);
//                    dd($del_result);
                    if($del_result1 && $del_result) {
                        $cart = $this->cart_list($sid);
                        return self::ajaxReturn(array('code'=>1,'msg'=>'success','cart'=>$cart[2],'other'=>$cart[1]));
                    }else{
                        return self::ajaxReturn(array('code'=>4,'msg'=>'error'));
                    }
                }elseif($val>1) {
                    $new_value=\Redis::hIncrBy($keyhash,'onum',-1);
                    $cart = $this->cart_list($sid);
                    if($new_value>0) {
                        return self::ajaxReturn(array('code'=>3,'msg'=>'success','gid'=>$gid,'onum'=>$new_value,'other'=>$cart[1]));
                    }else{
                        return self::ajaxReturn(array('code'=>2,'msg'=>'error'));
                    }
                }
            }
        }else{
            return self::ajaxReturn(array('code'=>1,'msg'=>'param is empty'));
        }
    }


    //清空购物车
    public function getRmgoods(Request $request)
    {
        //        商品id
        $sid = $request['sid'];
//        dd($sid);
//        用户id
        $uid = session('home_user')['uid'];
//        当前商品
//        $goods = Goods::where('gid',$gid)->get()->toArray();
//        dd($goods);
//        $goods_key = array_keys($goods);
//        $goods['onum'] = 1;
//        商家id
//        $sid = $goods['sid'];

//        利用队列里的值来做需要取数据的唯一索引，利用哈希的key的后缀名做原型数据的唯一索引
        $keylist = 'LIST:'.$uid.':'.$sid;
        $keyhash = 'HASH:'.$uid.':'.$sid.':';

        $listval = \Redis::lrange($keylist,0,-1);//获取链表中所有的值

//       1. 判断当前商品是否存在redis中
//        $res = \Redis::exists($keyhash);//检测键名是否设置

        if(!empty($uid) && !empty($sid) && !empty($listval)) {
            foreach($listval as $k=>$v){
                $del_result[] = \Redis::Del($keyhash.$v);//删除指定商品
            }
            $del_result1 = \Redis::Del($keylist);//删除指定链表
//            \Redis::Del('HASH:3:1:1');
//            \Redis::Del('LIST:3:1');
            if($del_result1>=0) {
                return self::ajaxReturn(array('code'=>1,'msg'=>'remove success'));
            }
        }else{
            return self::ajaxReturn(array('code'=>2,'msg'=>'param is empty'));
        }
    }

    //购物车列表
    protected function cart_list($sid)
    {
//        用户id
        $uid = session('home_user')['uid'];
//        $sid = $request['sid'];
        $re = SellerDetail::find($sid);
//dd($re);
//        利用队列里的值来做需要取数据的唯一索引，利用哈希的key的后缀名做原型数据的唯一索引
        $keylist = 'LIST:'.$uid.':'.$sid;
        $keyhash = 'HASH:'.$uid.':'.$sid.':';

        $listval = \Redis::lrange($keylist,0,-1);//获取链表中所有的值

//dd($listval);
        if(!empty($uid) && !empty($sid) && !empty($listval) ) {
            foreach($listval as $k=>$v){
                $goods_list[$v]=\Redis::hGetAll($keyhash.$v);//获取当前用户在当前商家的所有购物车商品
            }
//            dd($goods_list);
            $num = count($goods_list);
            $sum = '';
//            dd($sum);
            foreach($listval as $k=>$v){
                $sum += ($goods_list[$v]['gprice'] * $goods_list[$v]['onum']);
//                $sum += 3;
            }
//            for($i = 0;$i<$num;$i++){
//                $sum += ($goods_list[$i]['gprice'] * $goods_list[$i]['onum']);
//            }

            if($num>0){
                $top1 = $num * 66 + 264 -66;
                $top = $num * 66 + 219 - 66;
                $goods_other['top1'] = $top1;
                $goods_other['top'] = $top;
                $goods_other['sum'] = ($sum + $re['ofee']);
                $goods_other['num'] = $num;
                if($sum < $re['odelfee']){
                    $goods_other['pay'] = ($re['odelfee'] - $sum);
                }else{
                    $goods_other['pay'] = 'yes';
                }
            }else{
//                $goods_list['0']['top1'] = 45;
//                $goods_list['0']['top'] = 0;
            }
            $res[1] = $goods_other;
            $res[2] = $goods_list;
//            unset($res[2][7]);
//            unset($res[1]);
//            dd($res);
            return $res;
        }else{
            return null;
        }
    }


    public static function ajaxReturn($date){
        return $date;
    }
}
