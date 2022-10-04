<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>construction_edit</title>
</head>

<body>
    <header>
        @include('rakuda.header_kanri')
    </header>
    <main id="main">
        <h2>建物編集</h2>

        <form action="{{url('/construction_edit_comp')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="edit">
                <p class="import">更新情報を入力してください。<br>*がついていいる項目は必須入力です。</p>
                <p>号室：{{$date->room_number}}号室</p>
                <input type="hidden" id="id" name="id" value="{{$date->id}}">
                <p>工事完了日<span>*</span></p>
                <input type="date" name="comp_day" value="{{$date->comp_day}}">
                <p>工事名<span>*</span></p>
                <input type="text" name="name" value="{{$date->name}}">
                <p>原価<span>*</span></p>
                <input type="text" name="cost" value="{{$date->cost_price}}">円
                <p>発注金額<span>*</span></p>
                <input type="text" name="order" value="{{$date->order_value}}">円
                <p>添付ファイル（見積・資料等）</p>
                <input type="file" name="shuzen_PDF" value="{{$date->PDF}}">
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