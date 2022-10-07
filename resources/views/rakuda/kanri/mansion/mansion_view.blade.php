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
        <h2>建物詳細</h2>
        <div class="view_inner">
            <table>
                <tr>
                    <th>項目</th>
                    <th>詳細</th>
                </tr>
                <tr>
                    <th>マンションID</th>
                    <td>{{$date->id}}</td>
                </tr>
                <tr>
                    <th>マンション名</th>
                    <td>{{$date->name}}</td>
                </tr>
                <tr>
                    <th>オーナーID</th>
                    <td>{{$date->owner_id}}</td>
                </tr>
                <tr>
                    <th>マンション住所</th>
                    <td>{{$date->adress}}</td>
                </tr>
                <tr>
                    <th>総戸数</th>
                    <td>{{$date->total}}戸</td>
                </tr>
                <tr>
                    <th>築年数</th>
                    <td>{{$date->age}}</td>
                </tr>
            </table>
           
        </div>
        <div class="view_btn">
            <a class="view_henshu" href="/mansion_edit/{{$date->id}}">編集</a>
        </div>
    </main>
    <footer>
        @include('rakuda.footer')
    </footer>
</body>

</html>