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
       $arr = $request -> all();
        $count = $request -> input('count',2);
        $search = $request -> input('search');
        $data = Collection::orderBy('coid','asc')->where('coid','like','%'.$search.'%')->paginate($count);
        //dd($data);
        return view('admin.collection.collection',['data'=>$data,'count'=>$count]);
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
