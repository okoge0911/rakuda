<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contractor_view</title>
</head>
<body>
    <header>
    @include('rakuda.header_kanri')
    </header>
    <main id="main">
        <h2>契約者様情報詳細</h2>
        <div class="view_inner">
            <p>建物ID :{{$date->mansion_id}}</p>
            <p>契約者ID :{{$date->id}}</p>
            <p>部屋番号 :{{$date->roomnumber}}</p>
            <p>契約者名 :{{$date->name}}</p>
            <p>生年月日 :{{$date->birth}}</p>
            <p>性別 :{{$date->gender}}</p>
            <p>住所 :{{$date->adress}}</p>
            <p>連絡先　TEL :{{$date->tel}}</p>
            <p>連絡先 メールアドレス:{{$date->mail}}</p>
            <p>勤務先 :{{$date->work}}</p>
            <p>勤務先住所 :{{$date->work_adress}}</p>
            <p>勤務先:TEL :{{$date->work_tel}}</p>
            <p>連帯保証人・緊急連絡先 :{{$date->help}}</p>
            <p>連帯保証人/緊急連絡先名 :{{$date->help_name}}</p>
            <p>続柄 :{{$date->help_position}}</p>
            <p>連帯保証人/緊急連絡先:TEL :{{$date->help_tel}}</p>
            <p>パスワード設定 :{{$date->password}}</p>
            <p>その他 :@if(!empty($date->body))
                {{$date->body}}
                @endif</p>
            <p>身分証等:@if($date->PDF)<a class="mibun" href ="{{asset('/storage/'.$date->PDF)}}">添付資料の確認 @else 添付資料なし@endif</a></p>
       </div>
       <div class="view_btn">  
         
            <a class="view_henshu" href="/contractor_edit/{{$date->id}}">編集</a>
        </div>
    </main>
    <footer>
    @include('rakuda.footer')
    </footer>
</body>
</html>