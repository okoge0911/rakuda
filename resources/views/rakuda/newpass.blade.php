<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>パスワード再設定</title>
</head>
<body>
    <header>
    @include('rakuda.header')
    </header>
    <main>
       <div class="reset">
            <form action="/newpass_comp" method="POST">
            @csrf
                <h2>パスワード再設定</h2>
                <p>パスワードの再設定をお願いいたします。</p>
                <input type="password" name="pass" value="" required="パスワードを入力ください。">    
                <input type="submit" value="送信"> 
            </form>
       </div>
    </main>
    <footer>
    @include('rakuda.footer')
    </footer>
</body>
</html>