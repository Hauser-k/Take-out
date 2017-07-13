<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Seller\GoodsClassController;
use App\Http\Model\Goods;
use App\Http\Model\OrderGoods;
use App\Http\Model\Seller;
use Illuminate\Http\Request;
use App\Http\Model\SellerClass;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查出所有数据添加到页面中

        $data = SellerClass::get();


        $gooder= DB::table('seller')
            ->join('seller_detail', 'seller.sid', '=', 'seller_detail.sid')
            ->select('seller_detail.sfee','seller_detail.exname','seller_detail.slogo','seller_detail.sdelfee')
            ->get();

         return view('home/index',compact('data','gooder'));
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
