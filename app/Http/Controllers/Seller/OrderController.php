<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Order;

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
         $search = $request -> input('keywords');
         $data = Order::join('order_dist','order.oid','=','order_dist.oid')->where('order','like','%'.$search.'%')->paginate($count);
         // dd($data);
        return view('seller.order.order',['data'=>$data,'count'=>$count]);
    }

    
}
