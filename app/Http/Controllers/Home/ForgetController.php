<?php

namespace App\Http\Controllers\Home;
use App\Http\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\HttpController;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Input;
use Validator;
use Crypt;

class ForgetController extends Controller
{   




     public function phone(Request $request)
     {  

         $data = $request->all();
        // dd($data); 

        $user = User::where('utel',$data['phone'])->first();    
        if(!$user){
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return view('home/update');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ureset(Request $request)
    {
        
        $user = $request['utel'];
       return view('home/reset',compact('user'));
    }

     public function doureset(Request $request)
     {
       $input = $request->except(['_token']);
        // dd($input);

          $role = [
            'upwd'=>'required|between:6,18',
            'apassword'=>'same:upwd',
        ];

        $mess = [
            'upwd.required'=>'必须输入新密码',
            'upwd.between'=>'新密码必须在6-18位之间',
            'apassword.same'=>'确认密码必须跟新密码一致',
        ];

        $validator = Validator::make($input,$role,$mess);

        if ($validator->fails()) {

            return back()->withErrors($validator);
        }else{

            $utel = $request->input('utel');
            // dd($sid);
            $upwd = Crypt::encrypt($input['upwd']);

            $re =  User::where('utel',$utel)->update(['upwd'=>$upwd]);


            if($re){
                return redirect('/home/login');
            }else{
                echo "修改失败";
            }
        }
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
