
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
            <table>
                <tr>
                    <th>項目</th>
                    <th>詳細</th>
                </tr>
                <tr>
                    <th>オーナーID </th>
                    <td>{{$inner->id}}</td>
                </tr>
                <tr>
                <th>オーナー様名  </th>
                    <td>{{{$inner->name}}}</td>
                </tr>
                @foreach ($data as $val=>$key)
                <tr>
                <th>マンションID </th>
                    <td>{{$key->マンションID}}</td>
                </tr>

                <tr>
                    <th>マンション名</th>
                    <td>{{$key->マンション名}}</td>
                </tr>
                @endforeach
                <tr>
                <th>オーナー様住所</th>
                    <td>{{$inner->adress}}</td>
                </tr>
                <tr>
                <th>連絡先　TEL</th>
                    <td>{{$inner->tel}}</td>
                </tr>
                <tr>
                <th>連絡先 メールアドレス</th>
                    <td>{{$inner->mail}}</td>
                </tr>
                <tr>
                <th>パスワード設定</th>
                    <td>{{$inner->password}}</td>
                </tr>
                <tr>
                <th>その他</th>
                    <td>{{$inner->body}}</td>
                </tr>

            </table>
       
          
        
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