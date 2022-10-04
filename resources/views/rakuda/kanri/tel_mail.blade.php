<?php //dd($data);?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>連絡先の設定</title>
</head>
<body>
    <header>
    @include('rakuda.header_kanri')
    </header>
    <main id="main">
        <h2>連絡先設定</h2>
       <p class="setumei">下記に連絡先を入力し適用をすると、契約者専用の画面にて表示されます。</p>
       <form class="telmail" action="{{ url('/tel_mail_comp') }}" method="POST">
       @csrf
            <div class="telnum1">
                <input type="hidden" name="id" value="{{$data}}">
                <h3>ーー　緊急の問い合わせ　ーー</h3>
                <input class="num" type="text" name="telnum1_1" value="{{ old('telnum1_1')}}" placeholder="緊急連絡先" required="必須です。">
                <textarea class="inner" name="telnum1_2">時間帯などご記入ください</textarea>
            </div>
            <div class="telnum2">
                <h3>ーー　その他お問合せ　ーー</h3>
                <input class="num" type="text" name="telnum2_1" value="{{ old('telnum2_1')}}" placeholder="その他連絡先" required="必須です。">
                <textarea class="inner" name="telnum2_2">時間帯などご記入ください</textarea>
            </div>
            <div class="mail">
                <h3>ーー　メールでの問い合わせ　ーー</h3>
                <input class="num" type="email" name="email1" value="{{ old('mail1')}}" placeholder="メールアドレス" required="必須です。">
                <textarea class="inner" name="email2">返信までにかかる時間等ご記入ください</textarea>
            </div>
            <div class="telmail_btn">
        
                <input class="telmail_tekiyou" type="submit" value="適用">
            </div>
       </form>
    </main>
    <footer>
    @include('rakuda.footer')
    </footer>
</body>
</html>