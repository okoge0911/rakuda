<?php //dd($photo);?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inphto_view</title>
</head>
<body>
    <header>
    @include('rakuda.header_kanri')
    </header>
    <main id="main">
     <h2>入居前写真</h2>
     <div class="photo_inner">
        <div class="inphoto_check">
            <p>※ご契約者様が登録したものです。</p>
        <p class="day">最終登録日：{{$shosai}}</p>
        
        <div class="view">

            <div class="view_photo">
            @foreach($photo2 as $val=>$key)
            <img src="{{asset('/storage/'.$key->パス)}}" width="350" height="200">
            @endforeach
            </div>
           <div class="view_shosai">
            @foreach($photo as $val2)
           <p class="inphoto1">登録日：{{$val2->登録日時}} <br>{{$val2->詳細}}</p>
           @endforeach
           </div>
        
    </div>
        
        </div>
     </div>
  
    </main>
    <footer>
    @include('rakuda.footer')
    </footer>
</body>
</html>