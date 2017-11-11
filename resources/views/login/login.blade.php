<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>INI PAGE LOGIN BROW !!</h1>
    {{ $nama }}
    {{ $sekolah }}
    <ul>
        @foreach($dataArray as $data)
            @if($data == 'KAMU')
                <li>AHMAD FAUZAN</li>
            @else
                <li>{{ $data }}</li>
            @endif
        @endforeach
    </ul>
    <!-- bwat ngelink -->
    @include('login.form') 
</body>
</html>




<!-- Yang Ke 3 -->