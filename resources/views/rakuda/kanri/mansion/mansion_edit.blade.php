<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mansion_edit</title>
</head>

<body>
    <header>
        @include('rakuda.header_kanri')
    </header>
    <main id="main">
        <h2>建物編集</h2>

        <form action="{{url('/mansion_edit_comp')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="edit">
                <p class="import">建物の更新情報を入力してください。<br>*がついていいる項目は必須入力です。</p>
                <p>建物ID　:No.{{$date->id}}</p>
                <input type="hidden" id="id" name="id" value="{{$date->id}}">
                <p>家主ID<span>*</span></p>
                @error('owner_id')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="number" name="owner_id" value="{{$date->owner_id}}">
                <p>建物名<span>*</span></p>
                @error('mansion_name')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="mansion_name" value="{{$date->name}}">
                <p>所在地<span>*</span></p>
                @error('mansion_adress')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="mansion_adress" value="{{$date->adress}}">
                <p>総戸数<span>*</span></p>
                @error('mansion_kosu')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="number" name="mansion_kosu" value="{{$date->total}}">戸
                <p>築年数<span>*</span></p>
                @error('mansion_birth')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="date" name="mansion_birth" value="{{$date->age}}">
                <p>入退去に伴う案内等</p>
                @error('mansion_PDF')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="file" name="mansion_PDF" value="{{$date->PDF}}">
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