<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <title>管理会社新規登録</title>
</head>

<body>

    <main id="main_log">
        <div class="login">
            <h2>管理会社様新規登録</h2>
            <form action="{{url('/toroku')}}" method="POST">
                @csrf
                <p>管理会社名</p>
                @error('kanri_name')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="kanri_name" value="">
                <p>住所</p>
                @error('kanri_adress')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="kanri_adress" value="">
                <p>メールアドレス</p>
                @error('kanri_mail')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="email" name="kanri_mail" value="">
                <p>パスワード</p>
                @error('kanri_pass')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="password" name="kanri_pass" value="">
                <input type="submit" value="登録">
            </form>
        </div>

    </main>

</body>

</html>