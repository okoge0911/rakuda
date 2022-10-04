<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Mail;
// use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->user = new user();
     
    }

    public function logout(){
        session_start();
        session_destroy();
        return view('rakuda.login');
    }

    public function reset(Request $request){
        $reset = User::where('email','=',$request->mail)
                ->where('birth','=',$request->birth)
                ->get();
              

        if(count($reset)==0){
            $erro="※メールアドレスか生年月日に誤りがございます。";
            return view('rakuda.reset',['erro'=>$erro]);
        }else{
            $reset_id = $reset[0]->id;
            return view('rakuda.passreset',['reset_id'=>$reset_id]);
            // $mail = $reset[0]->email;

            // $passResetToken = md5(uniqid(rand(),true));
            // $url = 'http://localhost:8000/newpass_comp?passReset='.$passResetToken;

            // mb_language("Japanese");
            // mb_internal_encoding("UTF-8");
            
            // $subject = "パスワード再登録";
            // $massage = "下記URLよりアクセスしパスワードを変更してください。"."\r\n ".$url;
            // $headers = 'FROM:hello@example.com'."\r\n".'Return-Pat:hello@example.com';
        
            // if(mb_send_mail($mail,$subject,$massage,$headers)){
            //     echo "いけた";
            //     // return true;

            // }else{
            //     echo"だめ";
            //     // return false;
            // }
        //}
    }
    }
    public function reset_comp(Request $request){
        if($request->pass1==$request->pass2){
            $hash=Hash::make($request->pass1);
            $pass=User::find($request->id);
            $pass->password = $hash;
            $pass->save();
            return view('rakuda.passcomp');
        }
    }

    public function login(Request $request){
        session_start();
        $user = User::where('email','=',$request->logmail)
                ->get();
        if(count($user)==0){
           
            $erro="※メールアドレスかパスワードに誤りがございます。";
            return view('rakuda.login',['erro'=>$erro]);
            //return back()->['erro'=>$erro]);

        }else{
            foreach($user as $val){
                $pass = $val->password;
            }
            if(password_verify($request->logpass,$pass)){
                if($val->role == 0){
                    $data=$val->contractor_id;
                    $_SESSION['kanri_id'] = $val->kanri_id;
                    $_SESSION['contractor_id'] = $data;
                    return view('rakuda.contractor.contractor_home',['data'=>$data]);
                }elseif($val->role == 1){
                    $data=$val->owner_id;
                    $_SESSION['owner_id'] = $data;
                    return view('rakuda.owner.owner_home',['data'=>$data]);
                }elseif($val->role == 2){
                    $data=$val->id;
                    $_SESSION['id']=$data;
                    return view('rakuda.kanri.kanri_home',['data'=>$data]);
                }
            }else{
                $erro="※メールアドレスかパスワードに誤りがございます。";
                return view('rakuda.login',['erro'=>$erro]);
            }                
            
        }
    }

    public function new(Request $request){
        $request->validate(
            [
              'kanri_name' => 'required',
              'kanri_adress' => 'required',
              'kanri_mail' => 'required|email:filter,dns',
              'kanri_pass' => 'required',
              
            ],
            [
              'kanri_name.required' => '管理会社名は必須です。',
              'kanri_adress.required' => '所在地は必須です。',
              'kanri_mail.required'=>'メールアドレス必須です。',
              'kanri_mail.email'=>'正しいメールアドレスで入力ください。',
              'kanri_pass.required'=>'パスワードは必須です。',
            ]
          );

       
        $hash=Hash::make($request->kanri_pass);
        $user = new User;
        $user->name = $request->kanri_name;
        $user->adress= $request->kanri_adress;
        $user->email = $request->kanri_mail;
        $user->password = $hash;
        $user->role = 2;
        $user->save();

        return view('rakuda.newkanri_comp');

    }

}
