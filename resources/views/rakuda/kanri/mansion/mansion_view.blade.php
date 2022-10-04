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
            <p>マンションID : {{$date->id}}</p>
            <p>マンション名 :{{$date->name}}</p>
            <p>オーナーID :{{$date->owner_id}}</p>
            <p>マンション住所 :{{$date->adress}}</p>
            <p>総戸数 :{{$date->total}}戸</p>
            <p>築年数 :{{$date->age}}</p>
          
        </p>
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