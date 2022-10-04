<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>owner_new</title>
</head>

<body>
    <header>
        @include('rakuda.header_kanri')
    </header>
    <main id="main">
        <h2>オーナー様新規登録</h2>

        <form class="owner_new" action="{{ url('/owner_comp') }}" method="POST">
            @csrf
            <div class="edit">
                <p class="import">オーナー様の新規登録情報を入力してください。<br><span>*</span>がついていいる項目は必須入力です。</p>
                <!-- <p>オーナーID・物件名</p> -->
                <p>オーナー様氏名<span>*</span></p>
                @error('owner_name')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="owner_name" value="{{old('owner_name')}}">
                <p>所在地<span>*</span></p>
                @error('owner_adress')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="owner_adress" value="{{old('owner_adress')}}">
                <p>連絡先：TEL<span>*</span></p>
                @error('owner_tel')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="owner_tel" value="{{old('owner_tel')}}">
                <p>連絡先：mail<span>*</span></p>
                @error('owner_mail')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="email" name="owner_mail" value="{{old('owner_mail')}}">
                <p>生年月日<span>*</span></p>
                <p class="span"><span>アプリ使用時に必要になる場合がございます。お間違えの無いように入力ください。</span></p>
                @error('birth')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="date" name="birth" value="{{old('birth')}}">
                <p>パスワード<span>*</span></p>
                <p class="span"><span>アプリの使用で必要になります。登録後編集ができない為、お間違えないようお願いします。</span></p>
                @error('owner_password')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <p>オーナー様のアプリログイン時の初期パスワードです。</p>
                <input type="text" name="owner_password" value="{{old('owner_password')}}">
                <p>その他</p>
                <textarea id="owner_shosai" name="owner_shosai">{{old('owner_shosai')}}</textarea>
            </div>
            <div class="mansion_edit_btn">
                <input type="submit" value="登録">
            </div>
        </form>


    </main>
    <footer>
        @include('rakuda.footer')
    </footer>
</body>

</html>