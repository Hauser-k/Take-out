<?php

namespace App\Http\Controllers\Seller;

use App\Http\Model\SellerDetail;
use App\Http\Model\SellerClass;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = SellerDetail::where('sid',$id)->first();
//        dd($data);
        $sellerclass = SellerClass::all();
        session(['logo' => $data->slogo]);
//        dd(session('user')->sid);
//        dd($sellerclass);
//        dd($data);
        return view('seller/information/setup',['data'=>$data,'sellerclass'=>$sellerclass]);
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
//        dd($request);
//        dd($id);
        $input =  $request->except(['_token','_method','file_upload','file_upload1']);

        $re = SellerDetail::where('sid',$id)->update($input);
        if($re){
            return redirect('seller/index/'.$id.'/edit')->with('success','修改成功');
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
        //
    }

    public function setupajax()
    {
//        将上传文件移动到制定目录，并以新文件名命名
        $file = Input::file('file_upload');
        if($file->isValid()) {
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;

//            将图片上传到本地服务器
            $path = $file->move(public_path() . '/seller/upload', $newName);

//            将图片上传到七牛云
//            \Storage::disk('qiniu')->writeStream('uploads/'.$newName, fopen($file->getRealPath(), 'r'));

//        返回文件的上传路径
//            $filepath = 'uploads/' . $newName;
            return $newName;
        }
    }
    public function eximageajax()
    {
        //        将上传文件移动到制定目录，并以新文件名命名
        $file = Input::file('file_upload1');
        if($file->isValid()) {
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;

//            将图片上传到本地服务器
            $path = $file->move(public_path() . '/seller/upload', $newName);

//            将图片上传到七牛云
//            \Storage::disk('qiniu')->writeStream('uploads/'.$newName, fopen($file->getRealPath(), 'r'));

//        返回文件的上传路径
//            $filepath = 'uploads/' . $newName;
            return $newName;
        }
    }
    public function exnameajax(Request $request)
    {
        $exname = $request['exname'];
        $value = Input::session()->get('user');
        // return $data = $value->sid;
        $re =  SellerDetail::where('exname',$exname)->where('sid',$value->sid)->first();
        //0表示成功 其他表示失败

        if($re!=''){
            $data = [
                'status'=>0,
                'msg'=>'该商家已存在！'
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'不存在！'
            ];
        }
        return $data;
    }
}
