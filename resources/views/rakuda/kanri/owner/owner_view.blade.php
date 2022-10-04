
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>owner_view</title>
</head>
<body>
    <header>
    @include('rakuda.header_kanri')
    </header>
    <main id="main">
        <h2>オーナー様情報詳細</h2>
        <div class="view_inner">
        <p>オーナーID : {{$inner->id}}</p>
        <p>オーナー様名 : {{$inner->name}}</p>
    @foreach ($data as $val=>$key)
        <p>マンションID : {{$key->マンションID}}</p>
        <p>マンション名 : {{$key->マンション名}}</p>
    @endforeach
        <p>オーナー様住所 : {{$inner->adress}}</p>
        <p>連絡先　TEL : {{$inner->tel}}</p>
        <p>連絡先 メールアドレス: {{$inner->mail}}</p>
        <p>パスワード設定 : {{$inner->password}}</p>
        <p>その他:{{$inner->body}}</p>
          
        
        </div>
        <div class="view_btn">    
            <a class="view_henshu" href="/owner_edit/{{$inner->id}}">編集</a>
        </div>
    </main>
    <footer>
    @include('rakuda.footer')
    </footer>
</body>
</html>