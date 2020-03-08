<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="height: 100vh">
<div class="d-flex flex-column justify-content-center align-items-center bg-dark" style="height: 100%;">
    <h1 class="text-white-50 py-2">SnapMail</h1>
    <div class="d-inline-flex flex-column p-4 rounded bg-light">
        @if(Session::has('status'))
            <div class="form-group alert alert-danger mb-0">
                {{Session::get('status')}}
            </div>
        @else
            <p style="font-weight: bold">Message :</p> {{$message->message}}
            <p style="font-weight: bold">Picture :</p> <img style="max-width: 200px" src="/storage/{{$message->photo_url}}">
        @endif
    </div>
</div>
</body>
</html>
