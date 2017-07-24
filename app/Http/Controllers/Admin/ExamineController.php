<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Seller;
use App\Http\Model\SellerDetail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ExamineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @author 海涛
     */
    public function index(Request $request)
    {
        //获取每页多少条
        $count = $request -> input('count',10);
        $search = $request -> input('search','');
        $all = $request -> all();

        // 把所有的数据获取到 并且分页分配到主页面
        $data = Seller::where('sname','like','%'.$search.'%')->whereIn('status',[1,3,5])-> paginate($count);


        return view('admin.examine.index',['data'=>$data,'request'=>$all]);

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
     * @author 海涛
     */
    public function edit($id)
    {
        //

        $all = Seller::where('sid',$id)->first();


        $data = DB::table('seller_detail')
            ->join('seller_class', 'seller_class.csid', '=', 'seller_detail.csid')
            ->where('sid',$id)->first();

        return view('/admin/examine/show',compact('data','all'));
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
            //  如果添加成功跳转到列表页
            return redirect('admin/examine');
        }else{
            return back()->with('error','添加失败');
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
        //
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
