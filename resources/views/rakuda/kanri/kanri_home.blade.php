<?php //dd($data);?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}" >
    <title>Kanri_Home</title>
</head>
<body>
<main id="home">
    <header>
    @include('rakuda.header_kanri')
    </header>
        <div class="menu">
            <a href ="{{ url('/mansionlist') }}">建物情報管理</a>
            <a href ="{{ url('/owner') }}">オーナー様情報管理</a>
            <a href ="{{ url('/contractor') }}">契約者様情報管理</a>
            <a href ="/setting/{{$data}}">設定</a>
    </div>
    <footer id ="home_footer">
    @include('rakuda.footer')
    </footer>
</main>
</body>
</html>