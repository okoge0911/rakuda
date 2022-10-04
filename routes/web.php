<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MansionController;
use App\Http\Controllers\ContractorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Report_innerController;
use App\Http\Controllers\ImgController;
use App\Http\Controllers\ConstructionController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\StartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\TelController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('rakuda.login');
});
Route::post('/login',[UserController::class,'login']);
Route::get('/login',[UserController::class,'login']);
Route::get('/log_comp', function () {
    return view('rakuda.login');
});

Route::get('/loguot',[UserController::class,'logout']);

Route::get('/pass', function () {
    return view('rakuda.reset');
});

Route::get('/passreset',[UserController::class,'reset']);
Route::post('/passreset',[UserController::class,'reset']);

//Route::get('pdf', [PDFController::class, 'index']);
Route::post('/reset_comp',[UserController::class,'reset_comp']);


Route::get('/newkanri', function () {
    return view('rakuda.newkanri');
});

Route::post('/toroku',[UserController::class,'new']);

// //////////////////管理会社画面//////////////////////


//管理会社画面ホーム//
// Route::get('/', function () {
//    return view('rakuda.kanri.kanri_home');
// });


//管理会社建物情報一覧へ//
Route::get('/mansionlist', function () {
    return view('rakuda.kanri.mansion.mansion');
});
//管理会社オーナー一覧へ//
// Route::get('/owner', function () {
//     return view('rakuda.kanri.owner.owner');
// });
Route::get('/owner',[OwnerController::class,'list']);

//管理会社契約者一覧へ
Route::get('/contractor', function () {
    return view('rakuda.kanri.contractor.contractor');
});





//管理会社設定画面へ
// Route::get('/setting', function () {
//     return view('rakuda.kanri.tel_mail');
// });
Route::get('/setting/{id}',[TelController::class,'tel']);


// //////////////////オーナー画面/////////////////////


// //オーナー画面ホーム//
// Route::get('/owner_home', function () {
//     return view('rakuda.owner.owner_home');
// });
Route::get('/owner_home',[OwnerController::class,'out']);

Route::get('/construction_list/{id}',[OwnerController::class,'find']);

Route::get('/kouzi_kensaku',[ConstructionController::class,'search']);

Route::get('/report_view/{id}',[ReportController::class,'view']);

Route::get('/file/{id}',[ConstructionController::class,'file']);

Route::get('/report_pdf/{id}',[ReportController::class,'pdf']);

// //////////////////契約者画面/////////////////////

// Route::get('/', function () {
//     return view('rakuda.contractor.contractor_home');
// });

Route::get('/rent',[ContractorController::class,'out']);
//////////////////管理会社画面 建物一覧画面//////////////////////

Route::get('/mansionlist',[MansionController::class,'list']);
Route::get('/mansionlist',[MansionController::class,'show']);
Route::get('/mansion_kensaku', [MansionController::class, 'index'])
    ->name('rakuda.kanri.mansion.mansion');

//建物一覧から戻るボタン//
Route::get('/kanri', [MansionController::class,'logout']);
   



//建物一覧から建物新規登録へ//
Route::get('/mansion_new', function () {
    return view('rakuda.kanri.mansion.mansion_new');
});
//建物一覧から修繕登録へ//
// Route::get('/construction_entrylist/{id}', function () {
//     return view('rakuda.kanri.mansion.construction_entrylist');
// });
Route::get('/construction_entrylist/{id}',[MansionController::class,'shuzenlist']);

//建物一覧から報告書作成へ//
Route::get('/report/{id}', function () {
    return view('rakuda.kanri.mansion.report');
});
Route::get('/report/{id}', [MansionController::class,'report1']);


//建物一覧から建物詳細へ//
// Route::get('/mansion_view', function () {
//     return view('rakuda.kanri.mansion.mansion_view');
// });

Route::get('/mansion_view/{id}', [MansionController::class,'edit']);
//建物削除//

Route::get('/mansion_del/{id}',[MansionController::class,'accountDelete']);
// Route::get('/mansion_del/{id}', function () {
//     return view('rakuda.kanri.mansion.mansion_del');
// });

//////////////////管理会社画面 修繕登録画面//////////////////////


//建物修繕登録画面から編集画面へ//

Route::post('/construction_edit',[ConstructionController::class,'edit']);
//Route::get('/construction_edit',[ConstructionController::class,'edit']);





//Route::post('/construction_edit/{id}',[MansionController::class,'shuzenlist']);
//Route::get('/construction_edit/{id}',[ContractorController::class,'list']);



//新規修繕登録//
//Route::post('/construction_entry',[MansionController::class,'new']);
//Route::post('/construction_entry',[ConstructionController::class,'entry']);

Route::post('/construction_entry', function () {
    return view('rakuda.kanri.mansion.construction_entry');
});



//修繕登録画面から建物一覧へ戻る//
Route::get('/mansion', function () {
    return view('rakuda.kanri.mansion./mansion');
});
//修繕登録画面から編集画面へ戻る//
Route::get('/construction_entrylist2', function () {
    return view('rakuda.kanri.mansion.construction_entrylist');
});
//修繕履歴の削除
Route::get('/construction_del/{id}',[ConstructionController::class,'del']);
//修繕履歴編集
Route::get('/construction_comp/{id}',[ConstructionController::class,'view']);

//修繕履歴更新

Route::post('/construction_edit_comp',[ConstructionController::class,'edit_comp']);


//修繕履歴の削除
Route::get('/mansion_list', function () {
    return view('rakuda.kanri.mansion.mansion');
});
//修繕新規登録→完了画面へ
// Route::post('/entry_comp', function () {
//     return view('rakuda.kanri.mansion.entry_comp');
// });
Route::post('/entry_comp',[ConstructionController::class,'entry']);



//修繕新規登録→編集画面へ戻る
Route::get('/construction_entrylist3', function () {
    return view('rakuda.kanri.mansion./construction_entrylist');
});


//////////////////管理会社画面 報告書画面//////////////////////


//報告書完了画面へ
Route::post('/report_comp', [ReportController::class,'store']);
// Route::get('/report_comp', function () {
//     return view('rakuda.kanri.mansion.report_comp');
// });
//Route::post('/report_comp', [ImgController::class,'store']);

//報告書画面から建物情報一覧へ
Route::get('/mansion_list2', function () {
    return view('rakuda.kanri.mansion.mansion');
});


// //////////////////管理会社画面 建物編集//////////////////////
//閲覧画面から編集画面へ
// Route::get('/mansion_edit/{id}', function () {
//     return view('rakuda.kanri.mansion.mansion_edit');
// });
Route::get('/mansion_edit/{id}', [MansionController::class,'edit2']);


//編集画面から閲覧画面へ
Route::get('/mansion_view2', function () {
    return view('rakuda.kanri.mansion.mansion_view');
});
//編集画面から完了画面へ

Route::post('/mansion_edit_comp', [MansionController::class,'mansion_edit']);
Route::get('/mansion_edit_comp', function () {
    return view('rakuda.kanri.mansion.mansion_edit_comp');
});


// //////////////////管理会社画面 建物新規登録画面//////////////////////

Route::post('/mansion_new_comp',[MansionController::class,'mansion_entry']);
Route::get('/mansion_new_comp', function () {
    return view('rakuda.kanri.mansion.mansion_new_comp');
});
Route::get('/mansion_list',[MansionController::class,'list']);
Route::post('//mansion_list',[MansionController::class,'show']);

////////////////管理会社画面 オーナー新規登録画面//////////////////////
//オーナー一覧からオーナー新規登録画面へ
Route::get('/owner_new', function () {
    return view('rakuda.kanri.owner.owner_new');
});
//オーナー検索
Route::post('/owner_kensaku',[OwnerController::class,'index']);
Route::get('/owner_kensaku',[OwnerController::class,'index']);
// ->name('rakuda.kanri.owner.owner');

//オーナー一覧から詳細画面へ
// Route::get('/owner_view/{id}', function () {
//     return view('rakuda.kanri.owner.owner_view');
// });
Route::get('/owner_view/{id}',[OwnerController::class,'view']);



//オーナー一覧から削除画面へ
Route::get('/owner_del/{id}',[OwnerController::class,'accountDelete']);



//削除画面からオーナー一覧へ
Route::get('/ownerlist', function () {
    return view('rakuda.kanri.owner.owner');
});
//閲覧画面からオーナー一覧へ
Route::get('/owner_edit/{id}',[OwnerController::class,'edit']);

//編集画面から詳細画面へ
Route::get('/owner_view2', function () {
    return view('rakuda.kanri.owner.owner_view');
});
//編集画面から登録画面へ
// Route::post('/owner_edit_comp', function () {
//     return view('rakuda.kanri.owner.owner_edit_comp');
// });

Route::post('/owner_edit_comp',[OwnerController::class,'edit_comp']);


//オーナー新規登録
Route::post('/owner_comp',[OwnerController::class,'owner_entry']);




// //////////////////管理会社画面 契約者一覧画面画面//////////////////////

Route::post('/contractor_kensaku',[ContractorController::class,'index']);
//Route::get('/contractor_kensaku',[ContractorController::class,'index']);



//契約者一覧から新規登録画面へ
Route::get('/contractor_new', function () {
    return view('rakuda.kanri.contractor.contractor_new');
});
//契約者一覧から削除画面へ
// Route::get('/contractor_del', function () {
//     return view('rakuda.kanri.contractor.contractor_del');
// });
Route::get('/contractor_del/{id}',[ContractorController::class,'del']);



//契約者一覧から入居前の写真確認へ
Route::get('/inphoto_view/{id}',[StartController::class,'view']);



//契約者一覧から詳細画面へ
// Route::get('/contractor_view', function () {
//     return view('rakuda.kanri.contractor.contractor_view');
// });
Route::get('/contractor_view/{id}',[ContractorController::class,'view']);


//削除画面から契約者一覧へ
Route::get('/contractorlist', function () {
    return view('rakuda.kanri.contractor.contractor');
});
//契約者詳細から編集画面へ
// Route::get('/contractor_edit', function () {
//     return view('rakuda.kanri.contractor.contractor_edit');
// });
// Route::get('/contractor_edit', function () {
//     return view('rakuda.kanri.contractor.contractor_edit');
// });

Route::get('/contractor_edit/{id}',[ContractorController::class,'edit']);


//削除画面から契約者一覧へ
Route::get('/contractorlist2', function () {
    return view('rakuda.kanri.contractor.contractor');
});
//編集完了画面
// Route::post('/contractor_edit_comp', function () {
//     return view('rakuda.kanri.contractor.contractor_edit_comp');
// });
Route::post('/contractor_edit_comp',[ContractorController::class,'edit_comp']);

   


//新規登録完了画面へ
Route::post('/contractor_new_comp',[ContractorController::class,'new']);

//////////////////管理会社画面 設定画面//////////////////////

Route::post('/tel_mail_comp',[TelController::class,'telset']);
    



//////////////////オーナー画面//////////////////////
// //レポート画面からホームへ
// Route::get('/owner_back', function () {
//     return view('rakuda.owner.owner_home');
// });


// //////////////////契約者画面//////////////////////
//入居退去案内ページ
Route::get('/inout/{id}',[ContractorController::class,'info']);



//入居退去案内ページからホームへ
Route::get('/contractor_back', function () {
    return view('rakuda.contractor.contractor_home');
});

Route::get('/inout_info/{id}',[MansionController::class,'inout_info']);



//入居退去案内から写真登録へ
Route::get('/inphoto/{id}',[StartController::class,'photo']);
   

//写真登録から入居退去案内へ
Route::get('/inout_back', function () {
    return view('rakuda.contractor.inout');
});
//入居退去案内から写真登録完了へ
Route::post('/inphoto_comp', [StartController::class,'photo_comp']);

//入居退去案内から写真登録完了へ
Route::get('/in_tel', [TelController::class,'view']);

