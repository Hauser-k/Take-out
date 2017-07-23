<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\SellerClass;
use Input;
use App\Http\Model\SellerDetail;
use App\Http\Model\Seller;


class KaidianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $seller_user = session('seller_user');

        //商家分类
        $data = SellerClass::get();

        return view('seller.kaidian.index',compact('seller_user','data'));
        // return view('seller.kaidian.false');
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
        $input = Input::except('_token','s_province','s_city','s_county');
        $s = Input::get('s_province');
        $city = Input::get('s_city');
        $county = Input::get('s_county');
        $input['exarea'] = $s.$city.$county;
        //加入闪存
        $request->flash();
        //插入数据库
        $re = SellerDetail::create($input);
        //修改商家的状态
        $sid = Input::only('sid');
        $re1 = Seller::where('sid',$sid)->update(['status'=>1]);
        if($re && $re1){
            return view('seller.kaidian.success');
        }else{
            return back()->with('error','提交失败');
        }
       
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
     * @return \Illuminate\Http\Response 进入修改页面
     */
    public function xiugai()
    {   
        $sid = session('seller_user')->sid;
        $data = SellerDetail::where('sid',$sid)->first();

        //所有分类
        $sellerclass = SellerClass::get();
        // dd($data);
        return view('seller.kaidian.xiugaikaidian',compact('data','sellerclass'));
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
        $sellerclass = SellerDetail::find($id);
        $path1 = 'uploads/'.$sellerclass->eximage;
        $path2 = 'uploads/'.$sellerclass->slogo;
        $path3 = 'uploads/'.$sellerclass->licence1;
        $path4 = 'uploads/'.$sellerclass->licence2;
        $input = Input::except('_token','_method','s_province','s_city','s_county');
        //判断是否有图片上传 如果有 原上传图片删除,用新图片 没有 用原图片
        if(empty($request->eximage)){
           $input['eximage'] = $sellerclass->eximage;
        }else{
            if($sellerclass->eximage != ''){
                unlink($path1);
            }
            $input['eximage'] = $request->eximage;
        }
        //商家logo
        if(empty($request->slogo)){
           $input['slogo'] = $sellerclass->slogo;
        }else{
            if($sellerclass->slogo != ''){
                unlink($path2);
            }
            $input['eximage'] = $request->eximage;
        }
        //商家营业执照
        if(empty($request->licence1)){
           $input['licence1'] = $sellerclass->licence1;
        }else{
            if($sellerclass->licence1 != ''){
                unlink($path3);
            }
            $input['licence1'] = $request->licence1;
        }
        //餐饮服务许可
        if(empty($request->licence2)){
           $input['licence2'] = $sellerclass->licence2;
        }else{
            if($sellerclass->licence2 != ''){
                unlink($path4);
            }
            $input['licence2'] = $request->licence2;
        }
        // 拼地址
        $s = Input::get('s_province');
        $city = Input::get('s_city');
        $county = Input::get('s_county');
        $input['exarea'] = $s.$city.$county;
        // dd($input);
        $re = $sellerclass->update($input);
        if($re){
            return view('seller.kaidian.success');
        }else{
            return back()->with('error','提交失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatexnameajax(Request $request)
    {
        $exname = $request->input('exname');
        $sid = session('seller_user')->sid;
        $data = SellerDetail::where('sid','not like',$sid)->where('exname',$exname) -> count();
        
        if($data != 0){
            return ['status' => 0,'msg' => '该店铺已存在...'];
        }else{
            return ['status' => 1,'msg' => ' '];
        }
        
    }
}
