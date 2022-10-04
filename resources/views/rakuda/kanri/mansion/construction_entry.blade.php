<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>construction_entry</title>
</head>
<body>
    <header>
    @include('rakuda.header_kanri')
    </header>
    <main id="main">
       <h2>{{$_POST['room']}}号室修繕登録</h2>
        <div class="shuzen_toroku">
            <p>修繕工事の新規登録をしてください。<br><span>*</span>がついた項目は必須項目です。</p>
            <form action="{{ url('/entry_comp')}}" method="POST" enctype="multipart/form-data">
            @csrf 
                <input type="hidden" name="mansion_id" value="{{$_POST['mansion']}}">
                <input type="hidden" name="room" value="{{$_POST['room']}}">
                <p>工事完了日<span>*</span></p>
                @error('newcompday')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="date" name="newcompday" value="" >
                <p>工事名<span>*</span></p>
                @error('name')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="name" value="" placeholder="工事名">
                <p>原価<span>*</span></p>
                @error('costprice')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="costprice" value="" placeholder="原価">円
                <p>発注額<span>*</span></p>
                @error('value')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="value" value="" placeholder="発注額">円
                <p>見積書</p>
                <input type="file" name="mitumori" value="添付ファイル">
        
                <div class="shuezn_btn">
                  
                    <input type="submit" value="登録">
                </div>
            </form>
        </div>
    </main>
    <footer>
    @include('rakuda.footer')
    </footer>

</body>
</html>
