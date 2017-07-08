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
            $filepath = 'uploads/' . $newName;
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
                 ->where('goods.sid','=',Input::session()->get('user')->sid);
             });
        //通过$value->sid筛选到本用户登录评价信息
        $data = $data->paginate(2);  
        return view('seller.goods.index',['data'=>$data,'request'=>$all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $value = Input::session()->get('user');
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
        $input['sid'] = Input::session('')->get('user')->sid;
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
        $data = Goods::where('gid',$id);
        return view('seller.goods.edit',['data'=>$data]);
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
    public function gnameajax(Request $request)
    {   
        $gname = $request['gname'];
        $value = Input::session()->get('user');
        // return $data = $value->sid;
        $re =  Goods::where('gname',$gname)->where('sid',$value->sid)->first();
//         // $re =  Goods::where('sid',$value->sid)->where('gid',$gname)->get();
        
// // //       0表示成功 其他表示失败
        
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
}
