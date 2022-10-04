<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>owner_edit</title>
</head>

<body>
    <header>
        @include('rakuda.header_kanri')
    </header>
    <main id="main">
        <h2>オーナー様情報編集</h2>
        <form action="{{ url('/owner_edit_comp') }}" method="POST">
            @csrf
            <div class="edit">
            <p class="import">オーナー様の変更情報を入力してください。<br><span>*</span>がついていいる項目は必須入力です。</p>
                <p>オーナーID : No.{{$date->id}}</p>
                <input type="hidden" name="id" value="{{$date->id}}">
                <p>オーナー名<span>*</span></p>
                @error('owner_name')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="owner_name" value="{{$date->name}}">
                <p>所在地<span>*</span></p>
                @error('owner_adress')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="owner_adress" value="{{$date->adress}}">
                <p>連絡先：TEL<span>*</span></p>
                @error('owner_tel')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="owner_tel" value="{{$date->tel}}">
                <p>連絡先：メールアドレス<span>*</span></p>
                @error('owner_mail')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="email" name="owner_mail" value="{{$date->mail}}">
                <p>パスワード</p>
                <p>初期パスワードの設定は登録時に行っているため、編集の必要はございません。</p>
                <p>{{$date->password}}</p>
                <p>その他</p>
                <textarea id="owner_shosai" name="owner_shosai">{{$date->body}}</textarea>
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