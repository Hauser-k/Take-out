<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Seller\GoodsClassController;
use App\Http\Model\Collection;
use App\Http\Model\Goods;
use App\Http\Model\OrderGoods;
use App\Http\Model\Seller;
use App\Http\Model\SellerDetail;
use Illuminate\Http\Request;
use App\Http\Model\SellerClass;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Session;

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

        //把获取到的地址存到session中


        //调用下面的方法给值 变成数组 进行遍历
//        session(['addr' =>$res]);
        $hhh=self::actionGetNearShop(session('addr'))->toArray();

        $arr = [];
        foreach($hhh as $key=>$value){
            $arr[]=$value['sid'];
        }


        $data = SellerClass::get();
        $gooder= DB::table('seller')
				->join('seller_detail', 'seller.sid', '=', 'seller_detail.sid');

        //如果传过来的ID 不为空执行下面的where语句
        if(!empty($res['csid'])){
            $gooder = $gooder->where('seller_detail.csid',$res['csid'])->whereIn('seller_detail.sid',$arr)
                ->select()
                ->get();;
                if(empty($gooder)){
                echo '分类下面没有商家';
                header('refresh:1;index');
                die;
              }
        }else{
            $gooder = $gooder->whereIn('seller_detail.sid',$arr)
                    ->select()
                    ->get();
                if(empty($gooder)){
                    echo '附近没有商家...';
                    header('refresh:2;addr');
                    die;
            }
        }



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
    {
        //

        $res=Collection::where('sid',$id)->where('uid',session('home_user')['uid'])->count();

        if($res>=1) {
         return [
            'status' => 405,
            'msg' => '已经收藏'
        ];
        }else{

            if(!$id) return [
                'status' => 403,
                'msg' => '缺少必要数据,请联系我们修复'
            ];
            $data = [
                'uid' => session('home_user')['uid'],
                'sid' => $id
            ];
            if(Collection::insert($data)){
                return [
                    'status' => 0,
                    'msg' => '收藏成功'
                ];
            }else
                return [
                    'stauts' => 404,
                    'msg' => '内部错误,请稍候重试 ...'
                ];



        }


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


        if(!$id) return [
            'status' => 403,
            'msg' => '缺少必要数据,请联系我们修复'
        ];
        $data = [
            'uid' => session('home_user')['uid'],
            'sid' => $id
        ];

        if(Collection::where('sid',$id)->delete()){
            return [
                'status' => 0,
                'msg' => '取消成功'
            ];
        }else
            return [
                'stauts' => 404,
                'msg' => '内部错误,请稍候重试 ...'
            ];


    }
        /**
         * 计算某个经纬度的周围某段距离的正方形的四个点
         * 地球半径，平均半径为6371km
         * @param lng float 经度
         * @param lat float 纬度
         * @param distance float 该点所在圆的半径，该圆与此正方形内切，默认值为0.5千米
         * @return array 正方形的四个点的经纬度坐标
         */

    public static function getAroundCoordinate($lng, $lat,$distance = 5){

        $dlng =  2 * asin(sin($distance / (2 * 6371)) / cos(deg2rad($lat)));
        $dlng = round(rad2deg($dlng),6);

        $dlat = $distance/6371;
        $dlat = round(rad2deg($dlat),6);

        return array(
        'left-top'=>array('lat'=>$lat + $dlat,'lng'=>$lng-$dlng),
        'right-top'=>array('lat'=>$lat + $dlat, 'lng'=>$lng + $dlng),
        'left-bottom'=>array('lat'=>$lat - $dlat, 'lng'=>$lng - $dlng),
        'right-bottom'=>array('lat'=>$lat - $dlat, 'lng'=>$lng + $dlng)
    );
}

    public static function actionGetNearShop($res){
        $scope = 5;//5000米
        if(Input::has('excoorx')&&Input::has('excoory')){
            session(['addr'=>Input::all()]);

        }

        $lng = trim(session('addr')['excoorx']);//经度
        $lat = trim(session('addr')['excoory']);//纬度

    $fourpoint= self::getAroundCoordinate($lng,$lat,$scope);

    //从数据库中查询此范围内商铺

        //查出四个点的坐标
        $storeCoordinate = SellerDetail::where('excoory','>',$fourpoint['right-bottom']['lat'])
                                        ->where('excoory','<',$fourpoint['left-top']['lat'])
                                        ->where('excoorx','>',$fourpoint['left-top']['lng'])
                                        ->where('excoorx','<',$fourpoint['right-bottom']['lng']);
        if(Input::has('csid')){
            $storeCoordinate = $storeCoordinate ->where('csid','=',Input::get('csid'));
        }
        $storeCoordinate = $storeCoordinate->select()->get();



        foreach ($storeCoordinate as $k =>$v){
           if(sqrt((pow((($lat - $v['excoory'])* 111),2))+(pow((($lng - $v['excoorx'])* 111),2))) <= 5){
              //距离商家的距离
               $storeCoordinate[$k]['distance'] = sqrt((pow((($lat - $v['excoory'])* 111000),2))+(pow((($lng - $v['excoorx'])* 111000),2)));
            }

        }

         return $storeCoordinate;
    }

}
