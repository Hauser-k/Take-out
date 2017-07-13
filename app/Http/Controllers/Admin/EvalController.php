<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Evals;

class EvalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $re = Evals::join('seller','eval.sid','=','seller.sid')->join('user','eval.uid','=','user.uid')->get();

        $wh = [];

       if($request->has('search1')){
            $wh['escore'] = $request['search1'];
       }
       if($request->has('search2')){
            $wh['order'] = $request['search2'];
       }

        $request -> all();
        $arr = $request -> all();
        $count = $request -> input('count',5);

        $data = Evals::join('seller','eval.sid','=','seller.sid')->join('user','eval.uid','=','user.uid')->where($wh)->paginate($count);
        $input['art_time'] = time();
        return view('admin.eval.eval',['data'=>$data,'count'=>$count]);
    }


 /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        // 当前评价信息
        $data = Evals::find($id);
       
        return view('admin.eval.edit',['data'=>$data]);
    }
   
}
