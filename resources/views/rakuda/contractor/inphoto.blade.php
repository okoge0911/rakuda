<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inphoto</title>
</head>

<body>
    <header>
        @include('rakuda.header_rent')
    </header>
    <main id="main_con">
        <h2>入居時写真登録</h2>
        <p class="photo_annai">写真登録と写真の箇所（部屋のどの部分か）を記載してください。<br>
            <span>※契約開始日から１週間以内に登録してください。期間を超えた場合、ご入居者様の故意過失としての扱いにある場合がございます。</span>
        </p>
        <form action="{{ url('/inphoto_comp') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="photo_entry">
                <input type="hidden" name="contractor_id" value="{{$data}}">
                <h3>写真登録※</h3>
                @error('inphoto1[]')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="file" name="inphoto1[]" value="" required="写真の登録をしてください。">
                <h3>詳細記入※</h3>
                @error('inphoto2[]')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" id="inphoto2" name="inphoto2[]" placeholder="写真の箇所について記載ください" required="箇所の記入をしてください。">
            </div>
            <div class="add3_btn">
                <p>※追加ボタンをクリックすると写真の追加が可能です。</p>
                <button id="add3" type="button">追加</button><span id="reload"></span>
            </div>
            <div class="inphoto_toroku_btn">
                <input type="submit" value="登録">
            </div>
        </form>
    </main>
    <footer>
        @include('rakuda.footer')
    </footer>
</body>

</html>