<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Collection;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $re = Collection::join('seller','collection.sid','=','seller.sid')->join('user','collection.uid','=','user.uid')->get();
        // dd($re);
       $arr = $request -> all();
        $count = $request -> input('count',2);
        $search = $request -> input('search');
        $data = Collection::join('seller','collection.sid','=','seller.sid')->join('user','collection.uid','=','user.uid')->where('coid','like','%'.$search.'%')->paginate($count);
        //dd($data);
        return view('admin.collection.collection',['data'=>$data,'count'=>$count]);
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除对应的用户
        $re = Collection::where('coid',$id)->delete();
        if($re){
            $data = [
            // 0表示成功 其他表示失败
                'status' => 0,
                'msg'=>'删除成功'
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'删除失败'
                ];
        }
        return $data;
        
    }
}
