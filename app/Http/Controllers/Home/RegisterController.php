<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Model\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HttpController;
use Crypt;

class RegisterController extends Controller
{     



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function phone(Request $request)
     {  

         $data = $request->all();
        // dd($data); 

        $user = User::where('utel',$data['phone'])->first();    
        if($user){
            $res = ['code'=>'no'];
            $res = json_encode($res);
            echo $res;
            die;
        }


        // return $data = $request->all();
        $phone = $request -> input('phone');
        $res = self::phoneto($phone);
        echo $res;
     }


     public static function phoneto($phone){
        // $phone = '18518175354';
        $phone_code = rand(1000,9999);
        $str = 'http://106.ihuyi.com/webservice/sms.php?method=Submit&account=C69625028&password=0eaca3de9e7976c307aefc68c0fde217&format=json&mobile='.$phone.'&content=您的验证码是：'.$phone_code.'。请不要把验证码泄露给其他人。';
        $res = HttpController::get($str);
        session(['phone_code'=>$phone_code]);
        return $res;
     }
    public function index()
    {
         return view('home/zhuce');
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
        
       
        $phone = session('phone_code');
        // dd($phone);
         $phone2 = $request -> input('phone');
         $request -> flash();
           if($phone != $phone2){
            return back() -> with('error','动态码错误');
        }


         $data = $request -> except('_token','password','phone');
        // if($data['upwd'] !=$data['password']){
        //     return back() -> with('error3','密码不一致');
        // }

        $data['upwd'] = Crypt::encrypt($data['upwd']);
        $data['utime'] = time();
        $data['utoken'] = str_random(50);
        $data['uname'] = str_random('10');
         // dd($data);
         
       
        $res = User::where('utel',$data['utel'])->first();
        // dd($res);
         if(!$res==$data['utel']){
                  $re = User::create($data);
                  return redirect('/home/login/');
                 

        }else{
            return back()->with('error2','用户已存在');
           

        }


        

        // dd($data);
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
        //
    }
}
