<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>in_tel</title>
</head>

<body>
    <header>
        @include('rakuda.header_rent')
    </header>
    <main id="main_con">
        <h2>入居中の問い合わせ先</h2>
        <div class="tel_mail">
            <h3>【緊急の問い合わせ】</h3>
            <div class="tel_mail_inner">
                <h4>TEL:{{$query->tel1}}</h4>
                <p>{{$query->tel1_inner}}</p>
            </div>
            <h3>【その他お問合せ】</h3>
            <div class="tel_mail_inner">
                <h4>TEL:{{$query->tel2}}</h4>
                <p>{{$query->tel2_inner}}</p>
            </div>
            <h3>【メールでの問い合わせ】</h3>
            <div class="tel_mail_inner">
                <h4><a href="mailto:{{$query->mail}}">メール作成する</a></h4>
                <p>{{$query->mail_inner}}</p>
            </div>
        </div>
    </main>
    <footer>
        @include('rakuda.footer')
    </footer>
</body>

</html>