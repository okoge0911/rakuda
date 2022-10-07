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
<table>
    <tr>
        <th>項目</th>
        <th>詳細</th>
    </tr>
    <tr>
        <th>建物ID</th>
        <td>{{$date->mansion_id}}</td>
    </tr>
    <tr>
        <th>契約者ID</th>
        <td>{{$date->id}}</td>
    </tr>
    <tr>
        <th>部屋番号</th>
        <td>{{$date->roomnumber}}</td>
    </tr>
    <tr>
        <th>契約者名</th>
        <td>{{$date->name}}</td>
    </tr>
    <tr>
        <th>生年月日</th>
        <td>{{$date->birth}}</td>
    </tr>
    <tr>
        <th>性別</th>
        <td>{{$date->gender}}</td>
    </tr>
    <tr>
        <th>住所</th>
        <td>{{$date->adress}}</td>
    </tr>
    <tr>
        <th>連絡先　TEL</th>
        <td>{{$date->tel}}</td>
    </tr>
    <tr>
        <th>連絡先 メールアドレス</th>
        <td>{{$date->mail}}</td>
    </tr>
    <tr>
        <th>勤務先</th>
        <td>{{$date->work}}</td>
    </tr>
    <tr>
        <th>勤務先住所</th>
        <td>{{$date->work_adress}}</td>
    </tr>
    <tr>
        <th>勤務先:TEL</th>
        <td>{{$date->work_tel}}</td>
    </tr>
    <tr>
         <th>連帯保証人・緊急連絡先</th>
        <td>{{$date->help}}</td>
    </tr>
    <tr>
        <th>連帯保証人/緊急連絡先名</th>
        <td>{{$date->help_name}}</td>
    </tr>
    <tr>
        <th>続柄</th>
        <td>{{$date->help_position}}</td>
    </tr>
    <tr> 
        <th>連帯保証人/緊急連絡先:TEL</th>
        <td>{{$date->help_tel}}</td>
    </tr>
    <tr>
        <th>パスワード設定 </th>
        <td>{{$date->password}}</td>
    </tr>
    <tr>
        <th>その他</th>
        <td>@if(!empty($date->body))
                {{$date->body}}
                @endif</td>
    </tr>
    <tr>
        <th>身分証等</th>
        <td>@if($date->PDF)<a class="mibun" href ="{{asset('/storage/'.$date->PDF)}}">添付資料の確認 @else 添付資料なし@endif</td>
    </tr>


</table>
           
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