
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contractor_Home</title>
</head>
<body>
<main id="home">
    <header>
    @include('rakuda.header_rent')
    </header>
   
        <div class="menu_2">
            <a href ="/inout/{{$data}}">入退去に関する案内等</a>
            <a href ="{{ url('/in_tel') }}">入居中のお問合せ</a>
        </div>
   
        <footer id ="home_footer">
    @include('rakuda.footer')
    </footer>
    </main>
</body>
</html>