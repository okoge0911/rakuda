<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>construction_entry</title>
</head>

<body>
    <header>
        @include('rakuda.header_kanri')
    </header>

    <main id="main">
        <h2>修繕登録・編集</h2>
        <p class="shuzen_p">建物名：{{$date->name}}</p>
        <div class="shuzen_room">
            <table>
                <tr>
                    <th>号室</th>
                    <th>契約開始日</th>
                    <th>契約者</th>
                    <th>編集</th>
                    <th>新規登録</th>
                </tr>
                @foreach ($room as $val)
                <tr>
                    <td>{{$val->roomnumber}}</td>
                    <td>{{$val->start}}</td>
                    <td>{{$val->name}}</td>

                    <form action="{{ url('/construction_edit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="room" value="{{$val->roomnumber}}">
                        <input type="hidden" name="mansion" value="{{$date->id}}">

                        <td><input class="shuzen_btn" type="submit" name="henshu" value="編集"></td>
                    </form>


                    <form action="{{ url('/construction_entry') }}" method="POST">
                        @csrf
                        <input type="hidden" name="room" value="{{$val->roomnumber}}">
                        <input type="hidden" name="mansion" value="{{$date->id}}">

                        <td><input class="shuzen_btn" type="submit" name="toroku" value="登録"></td>
                    </form>
                    @endforeach
                </tr>
            </table>
        </div>

    </main>
    <footer>
        @include('rakuda.footer')
    </footer>
</body>

</html>