<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script>

    </script>
    <title>report</title>
</head>

<body>
    <header>
        @include('rakuda.header_kanri')
    </header>
    <main id="main">
        <h2>報告書作成</h2>
        <div class="report_inner">
        <p class="repo_span">報告書の内容を入力ください。<span>*</span>のついている箇所は必須項目です。</p>
            <form action="{{ url('/report_comp') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="reportday">
                
                    <p class="reportname">建物名：{{$report->name}}</p>
                    <input type="hidden" name="mansion_id" value="{{$report->id}}">
                    <p>報告書作成日<span>*</span></p>
                    @error('reportday')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <input type="date" name="reportday" value="{{ old('reportday') }}">
                </div>
                <div class="basho">
                    <p>報告箇所<span>*</span></p>
                    @error('place')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <input class="text1" type="text" name="place" value="{{ old('place') }}" placeholder="報告箇所の入力">
                </div>
                <div class="shosai_photo">
                    <p>報告内容<span>*</span></p>
                    @error('report_shosai[]')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <textarea id="text2" name="report_shosai[]">{{ old('report_shosai[]') }}</textarea>
                    <p>写真等添付ファイル<span>*</span></p>
                    @error('eport_photo[]')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <input class="report_photo" type="file" name="report_photo[]" required="資料は必須です。">
                </div>
                <p class="no">※追加ボタンにより、報告内容記入欄と添付ファイル追加が可能です。</p>
                <button id="add" type="button">詳細追加</button>
                <button id="add_photo" type="button">写真追加</button>


                <div class="report_btn">
                    <input type="submit" name="houkoku" value="報告書登録">
                </div>
            </form>
        </div>

    </main>
    <footer>
        @include('rakuda.footer')
    </footer>
</body>

</html>