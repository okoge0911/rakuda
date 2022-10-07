<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('/assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('/assets/js/common.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">
    <title>header</title>
</head>
<body>
    <header>
    </header>
    <main>
        <div class="kanriheader">
            <a class="kanriimg" href="{{url('/owner_home')}}"><img class="logo_header" src="{{ asset('assets/images/47441.png')}}"></a>
        
            <a class="kanrilogout" href="/loguot">ログアウト</a>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>