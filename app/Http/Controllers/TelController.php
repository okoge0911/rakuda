<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tel;

class TelController extends Controller
{
    public function __construct()
    {
        $this->tel = new tel();
        $this->tel = new user();
    }

    public function tel($id){
        $data=$id;
        return view('rakuda.kanri.tel_mail',['data'=>$data]);
    }

    public function telset(Request $request){
        $tel = new Tel;
        $tel->user_id = $request->id;
        $tel->tel1= $request->telnum1_1;
        $tel->tel1_inner=$request->telnum1_2;
        $tel->tel2=$request->telnum2_1;
        $tel->tel2_inner=$request->telnum2_2;
        $tel->mail=$request->email1;
        $tel->mail_inner=$request->email2;
        $tel->save();
    
        return view('rakuda.kanri.tel_mail_comp');
    }

    public function view(){
        session_start();
        $query =  Tel::select([
            't.tel1',
            't.tel1_inner',
            't.tel2',
            't.tel2_inner',
            't.mail',
            't.mail_inner',
         ])
             ->from('tels as t')
             ->leftJoin('users as u','u.id','=','t.user_id')
             ->where('t.user_id','=',$_SESSION['kanri_id'] )
             ->orderBY('t.id','desc')
             ->first();
    
    return view('rakuda.contractor.in_tel',['query'=>$query]);

    }
}
