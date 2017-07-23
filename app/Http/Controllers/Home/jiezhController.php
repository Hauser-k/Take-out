<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Addr;
use App\Http\Model\User;

class jiezhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = 1;
        session(['user_home'=>$id]);
        // 获取session中的uid
        $uid = $request -> session() -> get('user_home');
        // dd($uid);
        // 通过uid获取用户地址信息
        $addr = Addr::where('uid',$uid)->get();
        // dd($addr);
        return view('home.dizhi',['addr'=>$addr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jiesu(Request $request)
    {
        //通过ajax发送获取传来的所有值
        $data = $request -> all();

        // 将值存入session中
        session(['detail'=>$data]);
        // dd($data);
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
    public function Show(Request $request)
    {
        //获取session中的uid
        $all = $request -> session() ->all();
        // dd($all);
        $uid = $request -> session() -> get('user_home');
        // dd($uid);
        // 通过uid查出用户余额
        $data = User::where('uid',$uid)->get();


        // $pdo = new PDO('mysql:host=localhost;dbname=lamp182;charset=utf8','root','123456');
	    // // 开启事务 回滚点  innodb表
	    // $pdo -> beginTransaction();

	    // $res1 = $pdo -> exec('update money set money=money-1000 where name="凤轩"');
	    // $res2 = $pdo -> exec('update money set money=money+1000 where name="水哥s"');
	    // if($res1 && $res2){
	    // 	echo '转账成功';
	    // 	$pdo -> commit();//提交
    	// }else{
	    // 	echo '转账失败';
		//     $pdo -> rollback();//回滚
    	// }
         // dd($data);
        return view('home.jiezhang',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {




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
