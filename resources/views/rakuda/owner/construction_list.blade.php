<?php //dd($owner->id);?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta  name=”viewport” content=”width=device-width,initial-scale=1.0″>
    <title>construction_list</title>
</head>
<body>
    <header>
    @include('rakuda.header_owner')
    </header>
    <main id="main">
        <h2>修繕履歴一覧</h2>
        <form class="kensakuform" action="{{ url('/kouzi_kensaku') }}" method="GET">
        @csrf
        <div class="search">
                    <div class="search_inner">
                        <input type="hidden" name="ownerid" value="@if(isset($id)){{$id}}@elseif(isset($owner->id)){{$owner->id}}@endif">
                        <p>物件名</p>
                        <input class="inputkensaku" type="text" name="mansionname" value="@if (isset($mansionname)){{ $mansionname }}@endif" placeholder="物件名を記入">
                    </div>
                    <div class="search_inner">
                        <p>工事名</p>
                        <input class="inputkensaku" type="text" name="kouzi" value="@if (isset($kouzi)) {{ $kouzi }} @endif" placeholder="工事名を入力">
                    </div>
            </div>       
            <input class="kensaku" type="submit" value="検索">
        </form>
        <div class="mansion_list">
            <table>
                <tr>
                    <th>物件名</th>
                    <th>修繕箇所</th>
                    <th>工事完了日</th>
                    <th>工事名</th>
                    <th>金額</th>
                    <th>見積書等</th>
                </tr>
                @if(!empty($query))
                @foreach($query as $key)
                <?php // dd($query);?>
                <tr>
                    <td>{{$key->マンション名}}</td>
                    <td>{{$key->room_number}}</td>
                    <td>{{$key->comp_day}}</td>
                    <td>{{$key->name}}</td>
                    <td>{{$key->order_value}}円</td>
                    <td>@if(!($key->PDF==NULL))<a href="{{asset('/storage/'.$key->PDF)}}">添付ファイル確認@else 添付ファイルはございません。</a>@endif</td>
                </tr>
                @endforeach
                @endif
            </table>
        </div>
    
       
    </main>
    <footer>
    @include('rakuda.footer')
    </footer>
</body>
</html>