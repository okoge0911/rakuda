<?php //dd($query);?><!DOCTYPE html>
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
        <h2>報告書一覧</h2>
        <div class="reportlist">
            <table>
                <tr>
                    <th>報告日</th>
                    <th>物件名</th>
                    <th>報告箇所</th>
                    <th>報告書確認</th>
                </tr>
              @foreach($query as $key)
                <tr>
                    <th>{{$key->day}}</th>
                    <th>{{$key->name}}</th>
                    <th>{{$key->point}}</th>
                    <th><a class="a" href="/report_pdf/{{$key->id}}">確認</a></th>
                </tr>
                @endforeach
            </table>
        </div>
      
       
    </main>
    <footer>
    @include('rakuda.footer')
    </footer>
</body>
</html>