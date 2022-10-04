<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contractor_new</title>
</head>

<body>
    <header>
        @include('rakuda.header_kanri')
    </header>
    <main id="main">
        <h2>契約者様新規登録</h2>

        <form class="keiyaku_new" action="{{ url('/contractor_new_comp') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="edit">
                <p class="import">契約者様の新規登録情報を入力してください。<br><span>*</span>がついていいる項目は必須入力です。</p>
                <p>建物ID<span>*</span></p>
                @error('mansion_ID')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="number" name="mansion_ID" value="{{old('mansion_ID')}}">
                <p>号室<span>*</span></p>
                @error('room')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="room" value="{{old('room')}}">
                <p>契約開始日<span>*</span></p>
                @error('start')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="date" name="start" value="{{old('start')}}">
                <p>契約終了日<span>*</span></p>
                @error('end')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="date" name="end" value="{{old('end')}}">
                <p>契約者名<span>*</span></p>
                @error('contractor_name')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="contractor_name" value="{{old('contractor_name')}}">
                <p>性別<span>*</span></p>
                @error('gender')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input list="gender" name="gender" value="{{old('gender')}}">
                <datalist id="gender">
                    <option value="不明"></option>
                    <option value="男性"></option>
                    <option value="女性"></option>
                    <option value="適用不能"></option>
                </datalist>
                <p>所在地<span>*</span></p>
                @error('adress')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="adress" value="{{old('adress')}}">
                <p>連絡先：TEL<span>*</span></p>
                @error('tel')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="tel" value="{{old('tel')}}">
                <p>連絡先：mail<span>*</span></p>
                @error('mail')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="email" name="mail" value="{{old('mail')}}">
                <p>生年月日<span>*</span></p>
                @error('birth')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="date" name="birth" value="{{old('birth')}}">
                <p>勤務先<span>*</span></p>
                @error('work')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="work" value="{{old('work')}}">
                <p>勤務先住所<span>*</span></p>
                @error('work_adress')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="work_adress" value="{{old('work_adress')}}">
                <p>勤務先連絡先：TEL<span>*</span></p>
                @error('work_tel')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="work_tel" value="{{old('work_tel')}}">
                <p>連帯保証人・緊急連絡先<span>*</span>※選択してください。</p>
                @error('list')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input list="kinkyu" name="list" value="{{old('list')}}">
                <datalist id="kinkyu">
                    <option value="連帯保証人"></option>
                    <option value="緊急連絡先"></option>
                </datalist>
                <p>連帯保証人/緊急連絡先名<span>*</span></p>
                @error('kinkyu')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="kinkyu" value="{{old('kinkyu')}}">
                <p>続柄</p>
                <input type="text" name="kinkyu_zokugara" value="{{old('kinkyu_zokugara')}}">
                <p>連帯保証人/緊急連絡先：TEL<span>*</span></p>
                @error('kinkyu_tel')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="kinkyu_tel" value="{{old('kinkyu_tel')}}">
                <p>パスワード<span>*</span></p>
                @error('pass')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <p class="span"><span>契約者様のアプリログイン時の初期パスワードです。</span></p>
                <input type="text" name="pass" value="{{old('mansion_ID')}}">
                <div class="add">
                    <p>その他：身分証・申込書等</p>
                    <input class="sonota" type="file" name="mibunsho" value="{{old('mibunsho')}}">
                </div>
                <p>詳細記入</p>
                <textarea id="owner_shosai" name="comment">{{old('comment')}}</textarea>
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