<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MyCollecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mycollec(Request $request)
    {
        //
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */

        $res=$request -> all();

            $sid=Collection::get();
            $arr = [];
        foreach($sid as $key=>$value){
            $arr[]=$value['sid'];
        }

        //调用下面的方法给值 变成数组 进行遍历
//        session(['addr' =>$res]);

        $gooder= DB::table('seller')
            ->join('seller_detail', 'seller.sid', '=', 'seller_detail.sid')
            ->join('collection', 'seller.sid', '=', 'collection.sid')
            ->where('collection.uid',session('home_user')['uid'])
            ->whereIn('collection.sid',$arr)
            ->select()
            ->get();

        return view('home/mycollec',compact('gooder'));

    }




}
