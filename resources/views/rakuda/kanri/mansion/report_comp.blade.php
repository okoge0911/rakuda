<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>construction_comp</title>
</head>

<body>
    <header>
        @include('rakuda.header_kanri')
    </header>
    <main id="main">
        <div class="comp">
            <h2>報告書登録完了</h2>
            <p>報告書の作成が完了しました。</p>
            <a href="/mansionlist">建物情報管理に戻る</a>
        </div>
    </main>
    <footer id="home_footer">
        @include('rakuda.footer')
    </footer>

</body>

</html>