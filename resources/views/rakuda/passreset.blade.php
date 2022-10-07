<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <title>Document</title>
</head>

<body>
    <main id="main_log">
        <div class="login">
            <h2>パスワード再設定</h2>
            <p class="passp">新しいパスワードと確認用パスワードを入力ください。</p>
            <form action="/reset_comp" method="POST">
                @csrf
                <p>@if(!empty($erro))
                    {{$erro}}
                    @endif
                </p>
                <input type="hidden" name="id" value="{{$reset_id}}">
                <p class="p">新しいパスワード</p>
                <input type="password" name="pass1" value="" required="新しいパスワードをご入力ください。">
                <p class="p">確認用パスワード</p>
                <p class="p">※新しいパスワードと同じにしてください。※</p>
                <input type="password" name="pass2" value="" required="確認用パスワードをご入力ください。">
                <input type="submit" value="送信">
            </form>
        </div>

    </main>

</body>

</html>