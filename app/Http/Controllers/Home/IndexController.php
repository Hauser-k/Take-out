<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Seller\GoodsClassController;
use App\Http\Model\Collection;
use App\Http\Model\Goods;
use App\Http\Model\OrderGoods;
use App\Http\Model\Seller;
use Illuminate\Http\Request;
use App\Http\Model\SellerClass;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $res=$request -> all();
		
        $data = SellerClass::get();
        $gooder= DB::table('seller')
            ->join('seller_detail', 'seller.sid', '=', 'seller_detail.sid');
        //如果传过来的ID 不为空执行下面的where语句
        if(!empty($res['csid'])){
            $gooder = $gooder->where('seller.csid',$res['csid']);
        }
          $gooder = $gooder
                ->select('seller_detail.sfee','seller_detail.exname','seller_detail.slogo','seller_detail.sdelfee')
                ->get();

        //查出所有数据添加到页面中


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
    {          echo 1;
        //
//        if(!$id) return [
//            'status' => 403,
//            'msg' => '缺少必要数据,请联系我们修复'
//        ];
//        $data = [
//            'uid' => session('home_user') -> uid,
//            'sid' => $id
//        ];
//        if(Collection::insert($data)){
//            return [
//                'status' => 0,
//                'msg' => '收藏成功'
//            ];
//        }else
//            return [
//                'stauts' => 404,
//                'msg' => '内部错误,请稍候重试 ...'
//            ];
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
