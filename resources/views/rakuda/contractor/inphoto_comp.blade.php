<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inphoto_comp</title>
</head>
<body>
    <header>
    @include('rakuda.header_rent')
    </header>
    <main id="main">
    <div class="comp">
        <h2>登録完了</h2>
        <p>写真登録が完了しました。</p>
            <a href="{{url('/rent')}}">ホームに戻る</a>
        </div>
    </main>
    <footer id="home_footer">
    @include('rakuda.footer')
    </footer>
    
</body>
</html>