<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>owner_list</title>
</head>
<body>
    <header>
    @include('rakuda.header_kanri')
    </header>
    <main id="main">
        <h2>オーナー様一覧</h2>
      
            <form class="kensakuform" action="{{url('/owner_kensaku')}}" method="POST">
                @csrf
                <div class ="search">
                    <div class="search_inner">
                        <p>オーナー名</p>
                        <input class="inputkensaku" type="text" name="ownername" value="" placeholder="オーナー名を記入">
                    </div>
                    <div class="search_inner">
                    <p>物件名</p>
                    <input class="inputkensaku" type="text" name="mansionname" value="" placeholder="物件名を記入">
                    </div>
                </div>
                <input class="kensaku" type="submit" value="検索">
            </form>

        <div class="new_mansion">
            <a class="a" href="/owner_new">＋新規オーナー作成</a>
        </div>
        <div class="mansion_list">
            <table>
                <tr>
                    <th>オーナーNO</th>
                    <th>オーナー名</th>
                    <th>所在地</th>
                    <th>閲覧</th>
                    <th>削除</th>
                </tr>
                @foreach ($query as $val)
                <tr>
                    <td>{{$val->id}}</td>
                    <td>{{$val->name}}</td>
                    <td>{{$val->adress}}</td>
                    <td><a href="/owner_view/{{$val->id}}}">確認</a></td>
                    <td><a href="/owner_del/{{$val->id}}" onclick="return confirm('データは戻せません。削除して良いですか？')">削除</a></td>
                </tr>
                @endforeach
            </table>
            
        </div>
   
    </main>
    <footer>
    @include('rakuda.footer')
    </footer>
</body>
</html>