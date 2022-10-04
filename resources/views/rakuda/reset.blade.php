<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <title>パスワード再設定</title>
</head>

<body>

    <main id="main_log">
        <h2>パスワード変更</h2>
        <div class="login">
            <p class="passp">恐れ入りますが、登録されているメールアドレスとご本人様確認の為、生年月日をご入力ください。</p>
            <form action="/passreset" method="POST">
                @csrf
                <p>@if(!empty($erro))
                    {{$erro}}
                    @endif
                </p>
                <p>メールアドレス</p>
                <input type="email" name="mail" value="" required="メールアドレスをご入力ください。">
                <p>生年月日</p>
                <input type="date" name="birth" value="" required="生年月日をご入力ください。">
                <input type="submit" value="送信">
            </form>
        </div>
    </main>

</body>

</html>