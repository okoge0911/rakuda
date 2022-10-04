<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mansion_list</title>
</head>

<body>
    <header>
        @include('rakuda.header_kanri')
    </header>
    <main id="main">
        <h2 class="masion">建物情報一覧</h2>
        <form class="kensakuform" action="{{ url('/mansion_kensaku') }}" method="GET">
            @csrf
            <div class="search">
                <div class="search_inner">
                    <p>物件名</p>
                    <input class="inputkensaku" type="text" name="mansionname" value="@if (isset($mansionname)) {{ $mansionname }} @endif" placeholder="物件名を記入">
                </div>
                <div class="search_inner">
                    <p>所在地</p>
                    <input class="inputkensaku" type="text" name="mansionadress" value="@if (isset($mansionadress)) {{ $mansionadress }} @endif" placeholder="所在地を入力">
                </div>
            </div>
            <input class="kensaku" type="submit" value="検索">

        </form>

        <div class="new_mansion">
            <a href="{{ url('/mansion_new') }}">＋新規物件作成</a>
        </div>
        <div class="mansion_list">
            <table border="1">
                <tr>
                    <th>物件ID</th>
                    <th>物件名</th>
                    <th>所在地</th>
                    <th>修繕</th>
                    <th>報告書</th>
                    <th>閲覧・編集</th>
                    <th>削除</th>
                </tr>
                @if(!empty($data))
                @foreach ($data as $val)
                <tr>
                    <td>{{ $val->id }}</td>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->adress }}</td>
                    <td><a href="/construction_entrylist/{{$val->id}}">登録</a></td>
                    <td><a href="/report/{{$val->id}}">作成</a></td>
                    <td><a href="/mansion_view/{{$val->id}}">閲覧</a></td>
                    <td><a href="/mansion_del/{{$val->id}}" onclick="return confirm('データは戻せません。削除して良いですか？')">削除</a></td>
                    @endforeach
                    @endif
                </tr>
            </table>
            {!! $data->links('pagination::bootstrap-4')!!}
        </div>


    </main>

    <footer>
        @include('rakuda.footer')
    </footer>

</body>

</html>