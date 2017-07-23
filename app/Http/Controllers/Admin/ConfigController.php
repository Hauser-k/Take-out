<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Conf;

class ConfigController extends Controller
{   

    public function changeContent(Request $request)
    {
        // dd($request['conid']);

            foreach($request['conid'] as $k=>$v){
            $add = Conf::where('conid',$v)->update(['content'=>$request['content'][$k]]);

       }
        if($add){
           return back()->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
             // return redirect('admin/config');   
              // 

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       

        $data  = Conf::orderBy('conorder','asc')->get();
      
         foreach($data as $k=>$v){
            switch($v->contype){
                case 'input':
                    $data[$k]->content = '<input type="text" class="lg" name="content[]" value="'.$v->content.'">';
                    break;
                case 'textarea':
                    $data[$k]->content = '<textarea class="lg" name="content[]" >'.$v->content.'</textarea>';
                    break;
                case 'radio':
//                   
                    $arr = explode(',',$v->convalue);
//                 
                    $str = '';
                    foreach($arr as $m=>$n){
                        $a = explode('|',$n);
                        $c = ($v->content == $a[0])? ' checked': '';
                        $str.= '<input type="radio" name="content[]"'.$c.' value="'.$a[0].'">'.$a[1];
                    }

                    $data[$k]->content = $str;

                    break;
            }
        }

        return view('admin/config/index',compact('data'));
    }

         public function changeOrder(Request $request)
    {

//        先找到要修改排序的记录
        $input = $request->except('_token');
        // dd($input);
        $conf = Conf::where('conid',$input['conid'])->first();

//        更新这条记录的conorder字段
        $conf->conorder = $input['conorder'];
        $re = $conf->update();
//        如果修改成功
        if($re){
            $data =[
                'status'=>0,
                'msg'=>'修改成功'
            ];
        }else{
            $data =[
                'status'=>1,
                'msg'=>'修改失败'
            ];
        }
        return $data;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/config/add');
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::except('_token');
        // $input1 = Input::only('contype');
        // dd($input1);

        $res = Conf::create($input);

        if($res){
            return redirect('admin/config');
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
        //找到要修改的用户信息 传给修改列表
        $data = Conf::where('conid',$id)->first();
        return view('admin/config/edit',compact('data'));

        // return view('admin/config/edit');
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
        
         $input = $request->except(['_token',"_method"]);
         // dd($input);
        $re = Conf::where('conid',$id)->update($input);
        if($re){
            return redirect('admin/config');
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
       
        $re = Conf::where('conid',$id)->delete();

        if($re){
            $data = [
                'status'=>0,
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
