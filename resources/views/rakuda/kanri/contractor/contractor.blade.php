<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contractor_list</title>
</head>
<body>
    <header>
    @include('rakuda.header_kanri')
    </header>
    <main id="main">
        <h2>契約者様一覧</h2>
            <form class="kensakuform" action="{{ url('/contractor_kensaku')}}" method="POST">
                @csrf
                <div class ="search">
                    <div class="search_inner">
                        <p>物件名</p>
                        <input class="inputkensaku" type="text" name="mansionname" value="@if (isset($mansionname)) {{ $mansionname }} @endif" placeholder="物件名入力">
                    </div>
                    <div class="search_inner">
                        <p>契約者名</p>
                        <input class="inputkensaku" type="text" name="name" value="@if (isset($name)) {{ $name }} @endif" placeholder="契約者名入力">
                    </div>
                </div>
                <input class="kensaku" type="submit" value="検索">
            </form>
       
        <div class="new_mansion">
            <a href="/contractor_new">+新規契約者作成</a>
        </div>
        <div class="mansion_list">
            <table>
                <tr>
                    <th>契約者NO</th>
                    <th>部屋番号</th>
                    <th>契約者名</th>
                    <th>物件名</th>
                    <th>所在地</th>
                    <th>入居前写真</th>
                    <th>編集</th>
                    <th>削除</th>
                </tr>
                @if(!empty($query))
                    @foreach ($query as $val)
                <tr>
                    <td>{{$val->id}}</td>
                    <td>{{$val->roomnumber}}</td>
                    <td>{{$val->name}}</td>
                    <td>{{$val->マンション名}}</td>
                    <td>{{$val->マンション所在地}}</td>
                    <td><a href="/inphoto_view/{{$val->id}}">確認</a></td>
                    <td><a href="/contractor_view/{{$val->id}}">確認</a></td>
                    <td><a href="/contractor_del/{{$val->id}}" onclick="return confirm('データは戻せません。削除して良いですか？')">削除</a></td>
                    @endforeach
                @endif

                </tr>
            </table>
         
        </div>
      
    </main>
    <footer>
    @include('rakuda.footer')
    </footer>
</body>
</html>