<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Model\Seller;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HttpController;
use Crypt;
class RegisterController extends Controller
{   

     public function phone(Request $request)
     {  

         $data = $request->all();

        $user = Seller::where('stel',$data['phone'])->first();    
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

     public function stel(Request $request){

        $data = $request->all();
        // dd($data);
         $user = Seller::where('sname',$data['sname'])->first();  
         if($user){
            $res = ['code'=>'no'];
            $res = json_encode($res);
            echo $res;
            die;
         }
        
       
        
     }

      public function email(Request $request){
        $data = $request->all();
        $user = Seller::where('semail',$data['semail'])->first();  

        if($user){
            $res = ['code'=>'no'];
            $res = json_encode($res);
            echo $res;
            die;
         }
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('seller/zhuce/zhuce');
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
       // $a = $request->all();
       // dd($a);
        $phone = session('phone_code');
        // dd($phone); 
         $phone2 = $request -> input('phone');
         $request -> flash();
        if($phone != $phone2){
         return back() -> with('error','动态码错误');
        }

         $data = $request -> except('_token','password','phone');
         $data['spwd'] = Crypt::encrypt($data['spwd']);
         $data['stoken'] = str_random(50);
         $data['status'] = 5;
         // dd($data);

          $res = Seller::where('stel',$data['stel'])->first();
        // dd($res);
         if(!$res==$data['stel']){
                  $re = Seller::create($data);
                  return redirect('/seller/login/');
              
        }else{
            return back()->with('error2','手机号已存在');
           

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
