<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Seller;
use App\Http\Model\SellerDetail;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @author 海涛
     */
    public function index(Request $request)
    {
        //
        $count = $request -> input('count',10);
        $search = $request -> input('search','');
        $all = $request -> all();




        // 把所有的数据获取到 并且分页分配到主页面
        $data = Seller::where('sname','like','%'.$search.'%')->whereIn('status',[2,4])-> paginate($count);


        return view('admin.seller.index',['data'=>$data,'request'=>$all]);

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

        $data = DB::table('seller_detail')
            ->join('seller_class', 'seller_class.csid', '=', 'seller_detail.csid')
             ->where('sid',$id)->first();


        return view('/admin/seller/show',compact('data'));

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

        $data=Seller::where('sid',$id)->first();

        return view('/admin/seller/edit',compact('data'));
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


        $all = $request->except(['_token','_method']);



        $res = Seller::where('sid',$id)->update($all);
        if($res){
            //  如果添加成功跳转到分类列表页
            return redirect('admin/seller');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // 制作事务
        DB::beginTransaction();
        $re1 = Seller::where('sid',$id)->delete();
        $re2 =  SellerDetail::where('sid',$id)->delete();
        if($re1 && $re2){
            DB::commit();
            $data = [
                'status'=>0,
                'msg'=>'删除成功！'
            ];
        }else{
            DB::rollBack();
            $data = [
                'status'=>1,
                'msg'=>'删除失败！'
            ];
        }

       return $data;
    }



}
