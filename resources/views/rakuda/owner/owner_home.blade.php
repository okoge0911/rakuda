<?php //    dd($data);?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Owner_Home</title>
</head>
<body>
<main id="home">
    <header>
    @include('rakuda.header_owner')
    </header>
   
    
    <div class="menu_2">
            <a href ="/construction_list/{{$data}}">修繕履歴の確認</a>
            <a href ="/report_view/{{$data}}">報告書の確認</a>
        </div>
   
        <footer id ="home_footer">
    @include('rakuda.footer')
    </footer>
    </main>
</body>
</html>