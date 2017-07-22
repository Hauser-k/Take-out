<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\OrderDist;
use App\Http\Model\Order;

class WarnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function warn()
    {
        $sid = session('seller_user')->sid;
       $data = [];
        $data[] = Order::join('order_dist','order.oid','=','order_dist.oid')->where('sid',$sid)->where('ostatus',2)->count();
        $data[] = Order::join('order_dist','order.oid','=','order_dist.oid')->where('sid',$sid)->orderBy('otime','desc')->first()->otime;
        return $data;
    }

   
}
