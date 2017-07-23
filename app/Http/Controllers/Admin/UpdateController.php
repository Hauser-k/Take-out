<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Crypt;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin;
use Validator;
use Session;
use Illuminate\Contracts\Encryption\DecryptException;

class UpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin/update/edit');

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

        $data = Admin::where('aid',$id)->first();
       return view('admin/update/edit',compact('data'));
     
      
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
        // dd($input['apwd']);

        $role = [
            'apwd'=>'required|between:6,18',
            'apassword'=>'same:apwd',
        ];

        $mess = [
            'apwd.required'=>'必须输入新密码',
            'apwd.between'=>'新密码必须在6-18位之间',
            'apassword.same'=>'确认密码必须跟新密码一致',
        ];

        $v = Validator::make($input,$role,$mess);
        // dd($v);
        if($v->passes()){
            // return redirect('admin/index');
            $user = Admin::where('aid',session('admin_user')->aid)->first();
            $new = Crypt::decrypt($user->apwd);

          if($input['password'] != $new ){
             return back()->with('errors','输入的原密码跟数据库中的密码是否一致');
         }else{

            $pass = Crypt::encrypt($input['apwd']);

            $re = Admin::where('aid',session('admin_user')->aid)->update(['apwd'=>$pass]);
            
//            判断是否更新成功
            if($re){
                //         更新密码
                return redirect('admin/login');
               
            }else{
                return back()->with('errors','密码更新失败');
               
            }
         }
            
        }else{
             return back()->withErrors($v);
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
}
