<?php //dd($report);?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
    @font-face {
      font-family: ipaexg;
      font-style: normal;
      font-weight: normal;
      src: url('{{ storage_path('fonts/ipaexg.ttf') }}') format('truetype');
    }
    @font-face {
      font-family: ipaexg;
      font-style: bold;
      font-weight: bold;
      src: url('{{ storage_path('fonts/ipaexg.ttf') }}') format('truetype');
    }
    body {
      font-family: ipaexg !important;
    }




   
    h2{
        margin-top: 10px;
        font-size: 35px;
        width: 90%;
        text-align: center;
    }
    .day{
        width: 90%;
        text-align: center;
    }
    .point{
        width: 90%;
        text-align: center;
        font-size: 20px;
        margin-bottom: 50px;
       
    }
    

.right{
    width: 50%;
    float: right;
   
}
.shosai{
    /* padding-top: 10x; */
    height: 255px;
    border-bottom: 1px solid gray;
    width: 500px;
}

.left{
    width: 50%;
    float: left;
}
.left img{
    margin-bottom: 10px;
   margin-left: 10%;
}

  
</style>
   
</head>

<body>
    <header>
    <h2>報告書</h2>
    </header>
    <main>

 
    @foreach($mansion as $key)
        <h2>建物名：{{$key->name}}</h2>
        <p class="day">報告書作成日：{{$key->day}}</p>
        <p class="point">報告箇所：{{$key->point}}</p>
        @endforeach


    <div id="flex">
    <div class="left">
        @foreach($img as $photo)
        <img src ="{{public_path('/storage/'.$photo->imgpass)}}" width="380" height="260">
        @endforeach  
      
    </div>
  
    <div class="right">
    @foreach($inner as $val)
                <p class= "shosai">{{$val->body}}</p>
                @endforeach
               
    </div>
   
    </div>
      
               

    
    </main>
    <footer>

    </footer>
</body>
</html>