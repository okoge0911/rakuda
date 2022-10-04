<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Img;
use App\Models\Contractor;
use App\Models\Start;

class StartController extends Controller
{
    public function __construct()
    {
        $this->start = new start();
        $this->start = new img();
    }

    public function view($id){
        $photo = Start::select([
            'id',
            'created_at as 登録日時',
            'body as 詳細',
          

        ])
            ->from('starts')
            ->where('contractor_id','=',$id)
            ->get();

            $photo2 = Img::select([
                'imgpass as パス',
    
            ])
                ->from('imgs')
                ->where('contractor_id','=',$id)
                ->get();

      //dd($photo2);
        foreach($photo as $key){
            $shosai= $key->登録日時;
            //dd($shosai);
        }

        if(!empty($key)){
            return view('rakuda.kanri.contractor.inphoto_view',compact('photo','photo2','shosai'));
        }else{
            return view('rakuda.kanri.contractor.contractor');
        }
        
    }

    public function photo($id){
        $data = $id;
        return view('rakuda.contractor.inphoto',['data'=>$data]);

    }

     public function photo_comp(Request $request){

        $mansion = Contractor::select([
            'mansion_id',
        ])
            ->from('contractors')
            ->where('id','=',$request->contractor_id)
            ->get();

        foreach($mansion as $in =>$inner){
           $mansion = $inner->mansion_id;
        }
        
       // $photo-> body =  $request->contractor_id;
        $photo2 = $request->inphoto2;
        $file = $request->inphoto1;

                foreach($photo2 as $val=>$key){
 
                    $photo = new Start;
                    $photo -> contractor_id =  $request->contractor_id;
                    $photo -> body = $key;
                    $photo ->mansion_id = $mansion;
                    $photo -> save();
                    //$id[]=$photo->id;
                    
                }
                foreach($file as $val=>$key2){  
                    $img = new Img;
                    
                     $img->imgpass = $key2->store('');
                     $img->mansion_id = $mansion;
                     $img->contractor_id = $request->contractor_id; 
                     $img->save();
                 }
                 
                 return view('rakuda.contractor.inphoto_comp');
                }
        
        
            
       
            
           
    }
       
        

        



