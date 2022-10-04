<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Construction;
use App\Models\Mansion;
use Illuminate\Support\Facades\Storage;

class ConstructionController extends Controller
{
    public function __construct()
    {
        $this->construction = new construction();
        $this->construction = new mansion();
    }

    public function entry(Request $request)
    {

      $request->validate(
        [
          'newcompday' => 'required',
          'name' => 'required',
          'costprice' => 'required',
          'value' => 'required',
        ],
        [
          'newcompday.required'=>'工事完了日の入力は必須です。',
          'name.required'=>'工事名の入力は必須です。',
          'costprice.required'=>'原価の入力は必須です。',
          'value.required'=>'発注額の入力は必須です。',

        ]
      );
      //dd($request);
      $post = new Construction;
      $post->mansion_id = $request->mansion_id;
      $post->name = $request->name;
      $post->room_number = $request->room;
      $post->comp_day = $request->newcompday;
      $post->cost_price = $request->costprice;
      $post->order_value = $request->value;
      if(!empty($request->mitumori)){
        $post->PDF = $request->mitumori->store('');
      }
      $post->save();
      return view('rakuda.kanri.mansion.entry_comp');

    }


    public function edit(Request $request)
    {

       $update =  Construction::where('mansion_id','=',$request->mansion)
                ->where('room_number','=',$request->room)
                ->orderBY('comp_day','desc')
                    ->get();
                
        
       // dd($update);
      // dd($update);

    
            // $link = $data->paginate(5); 
            
            return view('rakuda.kanri.mansion.construction_edit',compact('update'));
        }
    
        public function view($id)
        {
          $date = Construction::find($id);
          return view('rakuda.kanri.mansion.construction_view', ['date' => $date]);
        }
        
        public function edit_comp(Request $request)
        {   

          $request->validate(
            [
              'comp_day' => 'required',
              'name' => 'required',
              'cost' => 'required',
              'order' => 'required',
            ],
            [
              'comp_day.required'=>'工事完了日の入力は必須です。',
              'name.required'=>'工事名の入力は必須です。',
              'cost.required'=>'原価の入力は必須です。',
              'order.required'=>'発注額の入力は必須です。',
    
            ]);
                $comp =  Construction::find($request->id);
                $comp->comp_day = $request->comp_day;
                $comp->name = $request->name;
                $comp->cost_price = $request->cost;
                $comp->order_value = $request->order;

               if(!empty($request->shuzen_PDF)){
                $comp->PDF = $request->shuzen_PDF->store('');
               }
               $comp->save();

               return view('rakuda.kanri.mansion.construction_comp');
            }

            public function del($id){
                $const =  Construction::find($id);
                $const->delete();
                return view('rakuda.kanri.mansion.construction_del');
            }
          
            public function index(Request $request){
              $ownername = $request->input('ownername');
              $mansionname = $request->input('mansionname');
            }
            
    
          

    

    public function search(Request $request)
    {
    
         $mansionname = $request->input('mansionname');
         $kouzi = $request->input('kouzi');
       
         $id = $request->ownerid;
       // dd($request->ownerid);
         if(empty($mansionname) && empty($kouzi)){
            
            return back();

          }else{
                if(!empty($mansionname)){
                    $query = Construction::select([
                       'c.id',
                       'c.name',
                       'c.room_number',
                       'c.comp_day',
                       'c.order_value',
                       'c.PDF',
                       'm.name as マンション名',
                    ])
                        ->from('constructions as c')
                        ->leftJoin('mansions as m','m.id','=','c.mansion_id')
                        ->where('m.owner_id','=',$request->ownerid)
                        ->where('m.name','LIKE',"%{$mansionname}%")
                        ->orderBY('c.room_number','asc')
                        ->get();
                    
                    //dd($query);
                   
                    }
                 
                 if(!empty($kouzi)){
                 
                    $query = Construction::select([
                      'c.id',
                      'c.name',
                      'c.room_number',
                      'c.comp_day',
                      'c.order_value',
                      'c.PDF',
                      'm.name as マンション名',
                    ])
                    ->from('constructions as c')
                    ->leftJoin('mansions as m','m.id','=','c.mansion_id')
                    ->where('m.owner_id','=',$id)
                    ->where('c.name','LIKE',"%{$kouzi}%")
                    ->orderBY('c.room_number','asc')
                    ->get();
      
                    }
                    return view('rakuda.owner.construction_list',compact('query','id'));
                   
                   
          }
        }
    
                

        public function file($id){
          $file = Construction::find($id);
         
          $pdf = $file->PDF;
  
          //dd($pdf);
         $path = 'public/'.$pdf;
         return Storage::download($path);
       // return response()->file(Storage::path($path));
        }
  }   
    