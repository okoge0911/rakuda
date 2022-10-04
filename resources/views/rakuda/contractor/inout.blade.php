<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inout</title>
</head>
<body>
    <header>
    @include('rakuda.header_rent')
    </header>
    <main id="main_con">
        <h2>入居・退去に関するご案内</h2>
        <div class="inout">
            <div class="inout_inner">
                <h3>【入退去のご案内】</h3>
                <p>案内のダウンロードは下記をクリックしてください。<br>
                ゴミ捨てのご案内、入居後、退去の手続きの流れなど記載がございます。</p>
                <a href="/inout_info/{{$info->mansion_id}}">入居・退去に伴うご案内</a>
            </div>
            <div class="inphoto_entry">
                <h3>【入居時室内登録】</h3>
                <p>入居時の室内の傷や汚れ等ございましたら、下記ボタンクリックして頂き登録ページにて写真とその箇所のご記入お願い致します。<br>
                    ※退去時のトラブルを防ぐための物の為、設備の故障により生活に支障のある場合は、こちらでなく管理会社へ直接お問い合わせください。</p>
                <a href="/inphoto/{{$info->id}}">入居時写真登録</a>
            </div>
        </div>
        
        <a class="home_con" href="{{url('/rent')}}">戻る</a>
     
    </main>
    <footer>
    @include('rakuda.footer')
    </footer>
</body>
</html>