<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>construction_edit</title>
</head>

<body>
    <header>
        @include('rakuda.header_kanri')
    </header>
    <main id="main">
        <h2>編集・登録</h2>
        <h3>{{$_POST['room']}}号室　修繕履歴</h3>
        <div class="room_shuzen">

            <table class="rireki">
                <tr>
                    <th>工事完了日</th>
                    <th>工事名</th>
                    <th>原価</th>
                    <th>発注金額</th>
                    <th>添付ファイル登録</th>
                    <th>削除</th>
                    <th>更新</th>
                </tr>

                @foreach ($update as $val)
                <form action="/construction_comp" method="POST" enctype="multipart/form-data">
                    @csrf
                    <tr>
                        <td>{{$val->comp_day}}</td>
                        <td>{{$val->name}}</td>
                        <td>{{$val->cost_price}}円</td>
                        <td>{{$val->order_value}}円</td>
                        <td>@if(!empty($val->PDF))
                            <a class="shuzen_btn" href="{{asset('/storage/'.$val->PDF)}}">登録あり(閲覧)</a>
                            @else
                            登録なし
                            @endif</td>
                        <td><a class="shuzen_btn" href="/construction_del/{{$val->id}}" onclick="return confirm('データは戻せません。削除して良いですか？')">削除</a></td>
                        <td><a class="shuzen_btn" href="/construction_comp/{{$val->id}}">更新</a></td>
                    </tr>
                    @endforeach
            </table>

            </form>

        </div>
    </main>
    <footer class="shozen_footer">
        @include('rakuda.footer')
    </footer>
</body>

</html>