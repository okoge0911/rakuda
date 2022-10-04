<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mansion;
use App\Models\Contractor;
use App\Models\Report;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;


class MansionController extends Controller
{
    private  $mansion;
    public function __construct()
    {
        $this->mansion = new mansion();
        $this->mansion = new contractor();
    }

    public function mansion_entry(Request $request)
  {

    $request->validate(
      [
        'mansion_name' => 'required',
        'mansion_adress' => 'required',
        'mansion_kosu' => 'required',
        'mansion_birth' => 'required',
        'mansion_PDF' => 'required',
      ],
      [
        'mansion_name.required' => '建物名は入力必須です。',
        'mansion_adress.required' => '所在地は入力必須です。',
        'mansion_kosu.required' => '戸数は入力必須です。',
        'mansion_birth.required' => '築年数は必須です。',
        'mansion_PDF.required' => '案内の添付は必須です。',
        
      ]
    );
    //$inputs = $request->all();
    //dd($inputs);
    // return view('rakuda.kanri.mansion.mansion_new', [
    //   'inputs' => $inputs,
    // ]);


    $post = new Mansion;
     $post->name = $request->mansion_name;
     $post->adress = $request->mansion_adress;
     $post->total = $request->mansion_kosu;
     $post->age = $request->mansion_birth;
     if(!empty($request['mansion_PDF'])){
        $post->PDF = $request->mansion_PDF->store('');
     }
    
     $post->owner_id = $request->ownerid;
     $post->save();
    return view('rakuda.kanri.mansion.mansion_new_comp');
  }

    public function list(Request $request)
    {
    $data = Mansion::all();
    return view('rakuda.kanri.mansion.mansion', ['data' => $data]);
    }

    public function show()
    {
        $data = Mansion::paginate(15);        
        return view('rakuda.kanri.mansion.mansion', compact('data'));
    }


    public function index(Request $request)
    {
        $mansionname = $request->input('mansionname');
        $mansionadress = $request->input('mansionadress');

        $query = Mansion::query();

        if(!empty($mansionname)) {
            $query->where('name', 'LIKE', "%{$mansionname}%");    
        }
        //dd($query);
        if(!empty($mansionadress)){
            $query->where('adress', 'LIKE', "%{$mansionadress}%"); 
        }
        $posts = $query->get();
        $data = $query->paginate(15); 

        return view('rakuda.kanri.mansion.mansion',compact('posts', 'mansionname', 'mansionadress', 'data'));
    }

    public function edit($id)
    {
      $date = Mansion::find($id);
      return view('rakuda.kanri.mansion.mansion_view', ['date' => $date]);
    }

    public function edit2($id)
    {
      $date = Mansion::find($id);
      return view('rakuda.kanri.mansion.mansion_edit', ['date' => $date]);
    }

    public function mansion_edit(Request $request){
      
      $request->validate(
        [
          'owner_id' => 'required',
          'mansion_name' => 'required',
          'mansion_adress' => 'required',
          'mansion_kosu' => 'required',
          'mansion_birth' => 'required',
         

        ],
        [
          'owner_id.required'=>'家主IDは入力は必須です。',
          'mansion_name.required' => '建物名は入力必須です。',
          'mansion_adress.required' => '所在地は入力必須です。',
          'mansion_kosu.required' => '戸数は入力必須です。',
          'mansion_birth.required' => '築年数は必須です。',
         
          
        ]
      );

      $update =  Mansion::find($_POST['id']);
      $update->name = $_POST['mansion_name'];
      $update->adress = $_POST['mansion_adress'];
      $update->total = $_POST['mansion_kosu'];
      $update->age = $_POST['mansion_birth'];

      if(!empty($request['mansion_PDF'])){
        $update->PDF = $request['mansion_PDF']->store('');
      }
    
      $update->owner_id = $_POST['owner_id'];
      $update->save();

    return view('rakuda.kanri.mansion.mansion_edit_comp');
    }


     public function accountDelete($id)
    {
     $user =  Mansion::find($id);
     $user->delete();
     return view('rakuda.kanri.mansion.mansion_del');
    }

    public function report1($id)
    {
     $report =  Mansion::find($id);
     return view('rakuda.kanri.mansion.report', ['report' => $report]);
    }

    public function shuzenlist($id)
    {
      $date = Mansion::find($id);

      $room = new contractor;
      $room = Contractor::where('mansion_id','=',$id)
     ->orderBY('roomnumber','asc')->get();
    
      return view('rakuda.kanri.mansion.construction_entrylist',compact('date','room'));
  
    }

    public function inout_info($id){
        
      $inout = Mansion::select([
          'm.PDF',
      ])
      ->from('mansions as m')
      ->leftJoin('contractors as c','c.mansion_id','=','m.id')
      ->where('m.id','=',$id)
      ->groupBY('m.id')
      ->get();
      
      foreach($inout as $val){
        $info = $val->PDF;
      }

       $path = $info;
       return Storage::download($path);
      //return response()->file(Storage::path($path));
 
    }
      public function logout(){
        session_start();
        $data =  $_SESSION['id'];
        return view('rakuda.kanri.kanri_home',['data'=>$data]);
      
      }
  }
   



  

   

