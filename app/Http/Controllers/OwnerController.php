<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->owner = new owner();
        $this->owner = new user();
    
    }
    public function owner_entry(Request $request)
    {   
        session_start();
        $request->validate(
            [
              'owner_name' => 'required',
              'owner_adress' => 'required',
              'owner_tel' => 'required|numeric|digits_between:8,11',
              'owner_mail' => 'required|email',
              'owner_password' => 'required',
              'birth' => 'required'
            ],
            [
              'owner_name.required'=>'オーナー様の氏名の入力は必須です。',
              'owner_adress.required' => '所在地の入力は必須です。',
              'owner_tel.required' => '電話番号の入力は必須です。',
              'owner_tel.numeric' => '数字で入力してください。',
              'owner_tel.digits_between' => '8~11桁の数字で入力してください。',
              'owner_mail.required' => 'メールアドレスの入力は必須です。',
              'owner_mail.email' => '正しいアドレスを入力ください。',
              'owner_password.required' => '初期パスワードの入力は必須です。',
              'birth.required' =>'生年月日の入力は必須です。'
            ]
          );

       $post = new Owner;
       $post->name = $request->owner_name;
       $post->adress = $request->owner_adress;
       $post->tel = $request->owner_tel;
       $post->mail = $request->owner_mail;
       $post->password = $request->owner_password;
       $post->body = $request->owner_shosai;
       $post->save();

       $id = $post->id;

       $hash=Hash::make($request->owner_password);
       $user = new User;
       $user->name = $request->owner_name;
       $user->email = $request->owner_mail;
       $user->birth = $request->birth;
       $user->kanri_id=$_SESSION['id'];
       $user->password = $hash;
       $user->owner_id = $id;
       $user->role = 1;
       $user->save();
      return view('rakuda.kanri.owner.owner_new_comp');
    }

    public function list(){
        $query = Owner::select([
            'o.id',
            'o.name',
            'o.adress',
        ])
            ->from('owners as o')
            ->leftJoin('mansions as m','m.owner_id','=','o.id')
            ->groupBy('o.id')
            ->orderBY('o.id','asc')
            ->get();
            
        return view('rakuda.kanri.owner.owner',['query'=>$query]);
    }




    public function index(Request $request)
    {
         $ownername = $request->input('ownername');
         $mansionname = $request->input('mansionname');

         if(empty($ownername)&& empty($mansionname)){
            
            return back();

             }else{
                if(!empty($ownername)){
                    $query = Owner::select([
                        'o.name',
                        'o.id',
                        'o.name',
                        'o.adress',
                    ])
                        ->from('owners as o')
                        ->leftJoin('mansions as m','m.owner_id','=','o.id')
                        ->where('o.name','LIKE',"%{$ownername}%")
                        ->orderBY('o.id','asc')
                        ->groupBy('o.id')
                        ->get();
                    
                 }
                 if(!empty($mansionname)){
                    $query = Owner::select([
                        'o.name',
                        'o.id',
                        'o.name',
                        'o.adress',
                    ])
                        ->from('owners as o')
                        ->leftJoin('mansions as m','m.owner_id','=','o.id')
                        ->where('m.name','LIKE',"%{$mansionname}%")
                        ->orderBY('o.id','asc')
                        ->groupBy('o.id')
                        ->get();
                    }
                    return view('rakuda.kanri.owner.owner',compact('query','ownername','mansionname'));
         }
         
        }
    
        public function view($id){
           // $data = Owner::find($id);

            $data = Owner::select([
                'o.id',
                'o.name',
                'o.adress',
                'o.tel',
                'o.mail',
                'o.password',
                'o.body',
                'm.id as マンションID',
                'm.name as マンション名'
            ])
                ->from('owners as o')
                ->leftjoin('mansions as m',function($join){
                    $join->on('m.owner_id','=','o.id');
                })
                ->where('o.id',"=",$id)
                ->get();
              //dd($data);
           
             foreach($data as $val){
                $inner=$val;
             }      
            //dd($data);
            return view('rakuda.kanri.owner.owner_view', compact('data','inner'));
        }
        
        public function edit($id){
            $date = Owner::find($id);
            //dd($date);
            return view('rakuda.kanri.owner.owner_edit',['date' => $date]);

        }

        public function edit_comp(Request $request){
            $request->validate(
                [
                  'owner_name' => 'required',
                  'owner_adress' => 'required',
                  'owner_tel' => 'required|numeric|digits_between:8,11',
                  'owner_mail' => 'required|email',
                  //'owner_password' => 'required',
                ],
                [
                  'owner_name.required'=>'オーナー様の氏名の入力は必須です。',
                  'owner_adress.required' => '所在地の入力は必須です。',
                  'owner_tel.required' => '電話番号の入力は必須です。',
                  'owner_tel.numeric' => '数字で入力してください。',
                  'owner_tel.digits_between' => '8~11桁の数字で入力してください。',
                  'owner_mail.required' => 'メールアドレスの入力は必須です。',
                  'owner_mail.email' => '正しいアドレスを入力ください。',
                 // 'owner_password.required' => '初期パスワードの入力は必須です。',
                  
                ]
              );
            $update = Owner::find($request->id);
            $update->name = $request->owner_name;
            $update->adress = $request->owner_adress;
            $update->tel = $request->owner_tel;
            $update->mail = $request->owner_mail;
            //$update->password = $request->owner_pass;
            $update->body = $request->owner_shosai;
            $update->save();
            return view('rakuda.kanri.owner.owner_edit_comp');
        }

       
        public function accountDelete($id)
        {
         $user =  Owner::find($id);
         $user->delete();
         return view('rakuda.kanri.owner.owner_del');
        }
       
        public function find($id){
            $owner = Owner::find($id);
            if(!empty($owner)){
                return view('rakuda.owner.construction_list',['owner'=>$owner]);
            }
        }
           
        // public function find2($id){
        //     $owner = Owner::find($id);
        //     if(!empty($owner)){
        //         return view('rakuda.owner.report_view',['owner'=>$owner]);
        //     }
        // }
       
        public function out(){
            session_start();
            $data = $_SESSION['owner_id'];
            return view('rakuda.owner.owner_home',['data'=>$data]);
        }
       

}



