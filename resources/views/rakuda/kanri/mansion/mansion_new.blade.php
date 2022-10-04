<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mansion_new</title>
</head>

<body>
    <header>
        @include('rakuda.header_kanri')
    </header>
    <main id="main">
        <h2>建物新規登録</h2>

        <form class="new_masion_sakusei" action="{{ url('/mansion_new_comp') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="new">
                <p class="import">建物の新規登録情報を入力してください。<br><span>*</span>がついていいる項目は必須入力です。</p>
                <p>オーナーID</p>
                <input type="number" name="ownerid" value="{{ old('ownerid') }}">
                <p>建物名<span>*</span></p>
                @error('mansion_name')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="mansion_name" value="{{ old('mansion_name') }}">
                <p>所在地<span>*</span></p>
                @error('mansion_adress')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="mansion_adress" value="{{ old('mansion_adress') }}">
                <p>総戸数<span>*</span></p>
                @error('mansion_kosu')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="number" name="mansion_kosu" value="{{ old('mansion_kosu') }}">
                <p>築年数<span>*</span></p>
                @error('mansion_birth')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="date" name="mansion_birth" value="{{ old('mansion_birth') }}">
                <p>入退去に伴う案内等<span>*</span></p>
                @error('mansion_PDF')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="file" name="mansion_PDF" value="{{ old('mansion_PDF') }}">
            </div>

            <div class="mansion_senshu_btn">
                <input type="submit" value="登録">
            </div>

        </form>


    </main>
    <footer>
        @include('rakuda.footer')
    </footer>
</body>

</html>