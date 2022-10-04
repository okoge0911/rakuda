<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mansion;
use App\Models\Contractor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


use function Ramsey\Uuid\v1;

class ContractorController extends Controller
{
    public function __construct()
    {
        $this->constractor = new contractor();
        $this->constractor = new user();
    }
    public function list($id)
    {
    $room = Contractor::query();
    $room->where('mansion_id','=',$id);
    $room->orderBY('roomnumber','asc');
    
    return view('rakuda.kanri.mansion./construction_edit', ['room' => $room]);
    }

    public function index(Request $request){
       
        $name = $request->input('name');
        $mansionname = $request->input('mansionname');

        if(empty($name)&& empty($mansionname)){
        
        return back();

            }else{
            if(!empty($name)){
                $query = Contractor::select([
                    'c.id',
                    'c.roomnumber',
                    'c.name',
                    'm.name as マンション名',
                    'm.adress as マンション所在地',
                ])
                    ->from('contractors as c')
                    ->leftJoin('mansions as m','m.id','=','c.mansion_id')
                    ->where('c.name','LIKE',"%{$name}%")
                    ->orderBY('c.roomnumber','asc')
                    ->get();
            
                }
                if(!empty($mansionname)){
                $query = Contractor::select([
                    'c.id',
                    'c.roomnumber',
                    'c.name',
                    'm.name as マンション名',
                    'm.adress as マンション所在地',
                ])
                    ->from('contractors as c')
                    ->leftJoin('mansions as m','m.id','=','c.mansion_id')
                    ->where('m.name','LIKE',"%{$mansionname}%")
                    ->orderBY('c.roomnumber','asc')
                    ->get();
                }
      
                return view('rakuda.kanri.contractor.contractor',compact('query','name','mansionname'));
        }

    }
    public function view($id){
        $date = Contractor::find($id);
       //dd( $date);
        return view('rakuda.kanri.contractor.contractor_view',['date' => $date ]);
    }

    public function edit($id)
    {
        $date = Contractor::find($id);
        return view('rakuda.kanri.contractor.contractor_edit', ['date' => $date]);
    }

    public function edit_comp(Request $request){
         $request->validate(
            [
              
              'room' => 'required',
              'start' => 'required',
               'end' => 'required',
               'contractor_name' => 'required',
               'gender' => 'required',
               'adress' => 'required',
               'tel' => 'required|numeric|digits_between:8,11',
               'mail' => 'required|email',
               'birth' => 'required',
               'work' => 'required',
               'work_adress' => 'required',
               'work_tel' => 'required|numeric|digits_between:8,11',
               'list' => 'required',
               'kinkyu' => 'required',
               'kinkyu_tel' => 'required|numeric|digits_between:8,11',
           
            ],
            [
              
               'room.required'=>'号室の入力は必須です。',
                'start.required'=>'契約開始日の入力は必須です。',
               'end.required'=>'契約満了日の入力は必須です。',
               'contractor_name.required'=>'契約者名の入力は必須です。',
               'gender.required'=>'性別の入力は必須です。',
                'adress.required'=>'所在地の入力は必須です。',
               'tel.required'=>'電話番号の入力は必須です。',
               'tel.numeric'=>'数字で入力してください。',
               'tel.digits_between'=>'8~11桁で入力してください。',
               'mail.required'=>'メールアドレスの入力は必須です。',
               'mail.email'=>'正しいメールアドレスを入力してください。',
               'birth.required'=>'生年月日の入力は必須です。',
               'work.required'=>'勤務先の入力は必須です。',
               'work_adress.required'=>'勤務先住所の入力は必須です。',
               'work_tel.required'=>'勤務先電話番号の入力は必須です。',
               'work_tel.numeric'=>'数字で入力してください。',
               'work_tel.between'=>'8~11桁で入力してください。',
               'list.required'=>'選択してください。',
               'kinkyu.required'=>'氏名の入力は必須です。',
              'kinkyu_tel.required'=>'緊急時の連絡先は必須です。',
               'kinkyu_tel.digits_between'=>'8~11桁で入力してください。',
               'kinkyu_tel.numeric'=>'数字で入力してください。',
            

             ]
          );

        $update = Contractor::find($request->id);
        $update->mansion_id = $request->id;
        $update->roomnumber = $request->room;
        $update->name = $request->contractor_name;
        $update->birth = $request->birth;
        $update->gender = $request->gender;
        $update->adress = $request->adress;
        $update->tel = $request->tel;
        $update->mail = $request->mail;
        $update->work = $request->work;
        $update->work_adress = $request->work_adress;
        $update->work_tel = $request->work_tel;
        $update->help = $request->list;
        $update->help_name = $request->kinkyu;
        $update->help_position = $request->kinkyu_zokugara;
        $update->help_tel = $request->kinkyu_tel;
        $update->password = $request->pass;
        $update->body = $request->comment;
      if(!empty($request['mibunsho'])){
        $update->PDF = $request['mibunsho']->store('');
      }
        $update->save();

        return view('rakuda.kanri.contractor.contractor_edit_comp');
    }


    public function new(Request $request){
        session_start();
        $request->validate(
            [
              'mansion_ID' => 'required',
              'room' => 'required',
              'start' => 'required',
              'end' => 'required',
              'contractor_name' => 'required',
              'gender' => 'required',
              'adress' => 'required',
              'tel' => 'required|numeric|digits_between:8,11',
              'mail' => 'required|email',
              'birth' => 'required',
              'work' => 'required',
              'work_adress' => 'required',
              'work_tel' => 'required|numeric|digits_between:8,11',
              'list' => 'required',
              'kinkyu' => 'required',
              'kinkyu_tel' => 'required|numeric|digits_between:8,11',
              'pass' => 'required',
              
            ],
            [
              'mansion_ID.required'=>'マンションIDの入力は必須です。',
              'room.required'=>'号室の入力は必須です。',
              'start.required'=>'契約開始日の入力は必須です。',
              'end.required'=>'契約満了日の入力は必須です。',
              'contractor_name.required'=>'契約者名の入力は必須です。',
              'gender.required'=>'性別の入力は必須です。',
              'adress.required'=>'所在地の入力は必須です。',
              'tel.required'=>'電話番号の入力は必須です。',
              'tel.numeric'=>'数字で入力してください。',
              'tel.digits_between'=>'8~11桁で入力してください。',
              'mail.required'=>'メールアドレスの入力は必須です。',
              'mail.email'=>'正しいメールアドレスを入力してください。',
              'birth.required'=>'生年月日の入力は必須です。',
              'work.required'=>'勤務先の入力は必須です。',
              'work_adress.required'=>'勤務先住所の入力は必須です。',
              'work_tel.required'=>'勤務先電話番号の入力は必須です。',
              'work_tel.numeric'=>'数字で入力してください。',
              'work_tel.between'=>'8~11桁で入力してください。',
              'list.required'=>'選択してください。',
              'kinkyu.required'=>'氏名の入力は必須です。',
              'kinkyu_tel.required'=>'緊急時の連絡先は必須です。',
              'kinkyu_tel.digits_between'=>'8~11桁で入力してください。',
              'kinkyu_tel.numeric'=>'数字で入力してください。',
              'pass.required'=>'初期パスワードの入力は必須です。',

            ]
          );


        $post = new Contractor;
        $post->mansion_id = $request->mansion_ID;
        $post->roomnumber = $request->room;
        $post->start = $request->start;
        $post->end = $request->end;
        $post->name = $request->contractor_name;
        $post->birth = $request->birth;
        $post->gender = $request->gender;
        $post->adress = $request->adress;
        $post->tel = $request->tel;
        $post->mail = $request->mail;
        $post->work = $request->work;
        $post->work_adress = $request->work_adress;
        $post->work_tel = $request->work_tel;
        $post->help = $request->list;
        $post->help_name = $request->kinkyu;
        $post->help_position = $request->kinkyu_zokugara;
        $post->help_tel = $request->kinkyu_tel;
        $post->password = $request->pass;
        $post->body = $request->comment;
      if(!empty($request['mibunsho'])){
        $post->PDF = $request['mibunsho']->store('public');
      }
        $post->save();
        //dd($post);
        $id = $post->id;

        $hash=Hash::make($request->pass);
        $user = new User;
        $user->name = $request->contractor_name;
        $user->email = $request->mail;
        $user->birth = $request->birth;
        $user->kanri_id=$_SESSION['id'];
        $user->password = $hash;
        $user->contractor_id = $id;
        $user->role = 0;
        $user->save();


        return view('rakuda.kanri.contractor.contractor_new_comp');

    }

    public function del($id){
        $user =  Contractor::find($id);
        $user->delete();
        return view('rakuda.kanri.contractor.contractor_del');
    }

    // public function tel(Request $request){
    //     //dd($request );
    //     session_start();
    //     $_SESSION['tel1-1'] = $request['telnum1-1'];
    //     $_SESSION['tel1-2'] = $request['telnum1-2'];
    //     $_SESSION['tel2-1'] = $request['telnum2-1'];
    //     $_SESSION['tel2-2'] = $request['telnum2-2'];
    //     $_SESSION['email1'] = $request['email1'];
    //     $_SESSION['email2'] = $request['email2'];
        
    //     return view('rakuda.kanri.tel_mail_comp');
    // }

    public function info($id){
        $info = Contractor::find($id);
        if(!empty($info)){
            return view('rakuda.contractor.inout',['info'=>$info]);
        }else{
            return back();
        }
    }

    public function out(){
        session_start();
        $data = $_SESSION['contractor_id'];
        return view('rakuda.contractor.contractor_home',['data'=>$data]);
    }

  
    


}
