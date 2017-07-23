<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Model\User ;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use Crypt;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       return view('home/denglu');
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
        $data = ($request->except('_token'));
        // dd($data);
        $res = User::where('utel',$data['utel'])->first();
        // dd($res);
        // dd(Crypt::encrypt('666'));
        if(!$res){
            return back() -> with('error','用户不存在');
        }else{
            // $res['apwd']; 用户的密码
            // $data['password']; 输入密码
             $password = Crypt::decrypt($res['upwd']);

             if($password == $data['upwd']){
                //添加session
                session(['home_user'=>$res]);

                 return redirect('home/index');
               

             }else{
                return back() -> with('error','用户名或密码错误');
             }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        //
        $request->session()->forget('home_user');

        return redirect('home/index');
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
        //


    }
}
