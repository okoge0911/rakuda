<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <title>Rakuda_Login</title>

</head>

<body>
    <main id="main_log">
        <div class="login">
            <p class="log_font">LOGIN</p>
            <form action="{{ url('/login')}}" method="POST">
                @csrf
                @if(!empty($erro))
                {{$erro}}
                @endif
                <p class="logid">ユーザーID</p>
                <input type="email" name="logmail" value="{{ old('logmail') }}" placeholder="メールアドレスを入力ください。">
                <p class="logid">パスワード</p>
                <input type="password" name="logpass" value="{{ old('logpass') }}" placeholder="パスワードを入力ください。">
                <input type="submit" value="ログイン">
            </form>
        </div>
        <div class="newlog">
            <a href="{{url('/pass')}}">*パスワードをお忘れの方（ご契約者様・オーナー様）はこちらへ</a>
            <a href="{{url('/newkanri')}}">*管理会社様新規登録ページはこちら</a>
        </div>
    </main>


</body>

</html>