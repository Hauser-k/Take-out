<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Goods;
use App\Http\Model\GoodsClass;
use Input;



class GoodsController extends Controller
{   
    public function upload()
    {

        //将上传文件移动到制定目录，并以新文件名命名
        $file = Input::file('file_upload');
        if($file->isValid()) {
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;

        //将图片上传到本地服务器
            $path = $file->move(public_path() . '/uploads', $newName);
        //返回文件的上传路径
            $filepath = $newName;
            return $filepath;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
       
        //获取session中的值
        // $value = Input::session()->get('user');
        $all = $request -> all();
        //连表查询 
        $data = Goods::join('goods_class',function ($join) {
        $join->on('goods.gcid', '=', 'goods_class.gcid')
                 ->where('goods.sid','=',Input::session()->get('seller_user')->sid);
             });
        //如果有查询 则进入这区间 拼$data
        if($request->has('fenleiming') || $request->has('gstatus')){
            
            $fenleiming = $request->input('fenleiming');
            
            if($fenleiming != null){
                $data = $data->where('gname','like',$fenleiming);
            }
        
            //如果传过来的是在售或售罄 
            if($request->input('gstatus') == 1){
                $data =  $data->where('gstatus','1');
            }
            if($request->input('gstatus') == 2){
                $data =  $data->where('gstatus','2'); 
            }
        }     
           

            $data = $data->paginate(5);

            return view('seller.goods.index',['data'=>$data,'request'=>$all]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $value = Input::session()->get('seller_user');
        $data =  GoodsClass::where('sid',$value->sid)->get();
     
        return view('seller.goods.add',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $input = Input::except('_token','file_upload');
        $input['sid'] = Input::session('')->get('seller_user')->sid;
        $input['gstatus'] = '1';
       
        $re = Goods::create($input);
        // $re1 = Goods::create($input1);
       
         // dd($re1);
        if($re ){
            return redirect('seller/goods');
        }else{
            return back()->with('error','添加失败');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Goods::where('gid',$id)->first();
        // dd($data->gid);
        $goodsclass = GoodsClass::where('sid',Input::session()->get('seller_user')->sid)->get();
        // dd($goodsclass);
        return view('seller.goods.edit',compact('data','goodsclass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {   
      
        $goods = Goods::find($id);
        $path = 'uploads/'.$goods->gpic;
        //从请求中获取传过来的数据
        $input = Input::except('_token','_method','file_upload');
        //判断是否有图片上传 如果有 原上传图片删除,用新图片 没有 用原图片
        if(empty($request->gpic)){
           $input['gpic'] = $goods->gpic;

        }else{
            if($goods->gpic != ''){
                unlink($path);
            }
            $input['gpic'] = $request->gpic;

        }
        
        // dd($input);
        $re = $goods->update($input);

        if($re){
        //如果添加成功跳转到分类列表页
            return redirect('seller/goods');
        }else{
            return back()->with('error','修改失败')->withInput();
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
        //删除对应id的
        $re =  Goods::where('gid',$id)->delete();
//       0表示成功 其他表示失败
        if($re){
            $data = [
                'status'=>0,
                'msg'=>'删除成功！'
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'删除失败！'
            ];
        }
        return $data;
    }
    //添加菜品时 验证菜名是否存在
    public function gnameajax(Request $request)
    {   
        $gname = $request['gname'];
        $value = Input::session()->get('seller_user');
        // return $data = $value->sid;
        $re =  Goods::where('gname',$gname)->where('sid',$value->sid)->first();
    //0表示成功 其他表示失败
        
        if($re!=''){
            $data = [
                'status'=>0,
                'msg'=>'该菜名已存在！'
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'不存在！'
            ];
        }
        return $data;
    }
   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return 修改菜单时 验证菜名 除去此菜名进行查找
     */
    public function updateajax(Request $request)
    {   
        $gname = $request['gname'];
        $gid = $request['gid'];

        $value = Input::session()->get('seller_user');
        
        $re = Goods::where('gname', $gname)->where('gid','not like',$gid)->count();
        // $re =  Goods::where('gname',$gname)->where('sid',$value->sid)->first();
    //0表示成功 其他表示失败
        // return $data = $re;
        if($re == 1){
            $data = [
                'status'=>0,
                'msg'=>'该菜名已存在！'
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'不存在！'
            ];
        }
        return $data;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return 点击按钮 点击在售 则 售罄 ;反之亦然;
     */
    //将状态修改为售罄
    public function zaishou(Request $request)
    {   

        $gid = $request['gid'];
        $status['gstatus']  = $request['status'];
        $res = Goods::where('gid',$gid)->update($status);
        if($res){
            $data = [
                'status'=>0,
                'msg'=>'修改成功！'
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'修改失败！'
            ];
        }
        return $data;
    }
}
