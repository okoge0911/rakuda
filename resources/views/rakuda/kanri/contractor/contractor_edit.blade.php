<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contractor_edit</title>
</head>
<body>
    <header>
    @include('rakuda.header_kanri')
    </header>
    <main id="main">
       <h2>契約者様編集</h2>
       
        <form action="{{ url('/contractor_edit_comp') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="edit">
                <p class="import">契約者様の新規登録情報を入力してください。<br><span>*</span>がついていいる項目は必須入力です。</p>
                    <input type="hidden" name="id" value="{{$date->id}}">
                    <p>建物ID</p>
                    <p>NO.{{$date->mansion_id}}</p>
                    <?php //dd($date); ?>
                    <p>号室<span>*</span></p>
                    @error('room')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <input type="text" name="room" value="{{$date->roomnumber}}">
                    <p>契約開始日<span>*</span></p>
                    @error('start')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <input type="date" name="start" value="{{$date->start}}">
                    <p>契約終了日<span>*</span></p>
                    @error('end')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <input type="date" name="end" value="{{$date->end}}">
                    <p>契約者名<span>*</span></p>
                    @error('contractor_name')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <input type="text" name="contractor_name" value="{{$date->name}}">
                    <p>性別※</p>
                    @error('gender')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <input list="gender" name="gender" value="{{$date->gender}}">
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
                    <input type="text" name="adress" value="{{$date->adress}}">
                    <p>連絡先：TEL<span>*</span></p>
                    @error('tel')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <input type="text" name="tel" value="{{$date->tel}}">
                    <p>連絡先：mail<span>*</span></p>
                    @error('mail')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <input type="email" name="mail" value="{{$date->mail}}">
                    <p>生年月日<span>*</span></p>
                    @error('birth')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <input type="date" name="birth" value="{{$date->birth}}">
                    <p>勤務先<span>*</span></p>
                    @error('work')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <input type="text" name="work" value="{{$date->work}}">
                    <p>勤務先住所※<span>*</span></p>
                    @error('work_adress')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <input type="text" name="work_adress" value="{{$date->work_adress}}">
                    <p>勤務先連絡先：TEL<span>*</span></p>
                    @error('work_tel')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <input type="text" name="work_tel" value="{{$date->work_tel}}">
                    <p>連帯保証人・緊急連絡先<span>*</span></p>
                    @error('list')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <input list="kinkyu" name="list" value="{{$date->help}}">
                        <datalist id="kinkyu">
                            <option value="連帯保証人"></option>
                            <option value="緊急連絡先"></option>
                        </datalist>
                    <p>連帯保証人/緊急連絡先名<span>*</span></p>
                    @error('kinkyu')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <input type="text" name="kinkyu" value="{{$date->help_name}}">
                    <p>続柄</p>
                    <input type="text" name="kinkyu_zokugara" value="{{$date->help_position}}">
                    <p>連帯保証人/緊急連絡先：TEL<span>*</span></p>
                    @error('kinkyu_tel')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <input type="text" name="kinkyu_tel" value="{{$date->help_tel}}">
                    <p>パスワード</p>
                    <p>初期パスワードの設定は登録時に行っているため、編集の必要はございません。</p>
                    <p> {{$date->password}}</p>
                  
                    <div class="add">
                        <p>その他：身分証・申込書等</p>
                        <input class="sonota" type="file" name="mibunsho" value="{{$date->password}}">
                    </div>
                   
                    <p>詳細記入</p>
                    <textarea id="owner_shosai" name="comment">{{$date->body}}</textarea>
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