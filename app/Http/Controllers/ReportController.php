<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF; 
use App\Models\Mansion;
use App\Models\Report;
use App\Models\Report_inner;
use App\Models\Img;

use Illuminate\Support\Facades\Storage;



class ReportController extends Controller
{
    public function __construct()
    {
        $this->report = new Report();
        $this->report = new Report_inner();
        $this->report = new img();
    }

    public function store(Request $request)
    {
        $request->validate(
            [
              'reportday' => 'required',
              'place' => 'required',
              'report_shosai' => 'required',
             
            ],
            [
              'reportday.required'=>'報告書作成日を入力してください。',
              'place.required' => '報告箇所を入力してください。',
              'report_shosai.required' => '詳細の入力をしてください。',
            

            ]
          );
     
            $repo = new Report;
            $repo -> point = $request -> place;
            $repo -> day = $request -> reportday;
            $repo -> mansion_id = $request -> mansion_id;
            $repo->save();
            $data = $repo->id;

            $shosai = $request->report_shosai;

            foreach($shosai as $key => $val){
                $inner = new Report_inner;
                $inner->report_id = $data;
                $inner->body=$val; 
                $inner->save();
                $innerid = $inner -> id;

            }


            $img=$request->report_photo;

           
            foreach($img as $key2=>$val2 ){
             
                $repoimg = new img;
                $repoimg->imgpass = $val2 -> store('');
                $repoimg-> report_id = $data;
                $repoimg-> report_inner_id = $innerid;
                $repoimg->mansion_id = $request -> mansion_id;
                $repoimg->save();
            }

        
       return view('rakuda.kanri.mansion.report_comp');
    }
         public function view($id){

                $query =  Report::select([
                   'r.id',
                   'm.name',
                   'r.day',
                   'r.point',
                   
                ])
                    ->from('reports as r')
                    ->leftJoin('mansions as m','m.id','=','r.mansion_id')
                    ->where('m.owner_id','=',$id)
                    ->orderBY('r.day','desc')
                    ->get();
              
                  
             //return view('rakuda.owner.report_view',['']);
             return view('rakuda.owner.report_view',['query'=>$query]);
         }

         public function pdf($id)
         {
            $mansion =  Report::select([
                'r.id',
                'm.name',
                'r.day',
                'r.point',
                
             ])
                 ->from('reports as r')
                 ->leftJoin('mansions as m','m.id','=','r.mansion_id')
                 ->where('r.id','=',$id)
                 ->get();

            $img = Img::select([
                'id',
                'imgpass',
            ])
                ->from('imgs')
                ->where('report_id','=',$id)
                ->get();
            
            $inner = Report_inner::select([
                'id',
                'body',
            ])
                ->from('report_inners')
                ->where('report_id','=',$id)
                ->get();
           /**
            * 出力したいviewを読み込む
            * この場合、views/output/pdf.blade.phpを出力する
            * パラメータを渡したい場合、普段のview()関数と同様に第二引数に指定してあげればOK
            * 今回日本語を使用するのでencodingに'utf-8'を指定
            * PDF::loadView('output.pdf', ['message' => 'Hello']);
            */
            $pdf = PDF::loadView('rakuda.owner.report_inner',compact('mansion','img','inner'));
                 return $pdf->stream('report.pdf');
            //return view('rakuda.owner.report_inner',compact('mansion','img','inner'));
       }
    

}
    
   


