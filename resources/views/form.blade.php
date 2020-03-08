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
        <form method="post" action="{{route('message.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Destinataire</label>
                <input type="email" value="{{old('mail')}}" class="form-control  @error('mail') is-invalid @enderror" name="mail" id="exampleInputEmail1">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Message</label>
                <textarea name="message" type="password" class="form-control  @error('message') is-invalid @enderror" id="exampleInputPassword1">{{old('message')}}</textarea>
            </div>
            <div class="form-group form-check">
                <input name="file" type="file" class="custom-file-input @error('file') is-invalid @enderror" id="inputGroupFile01" >
                <label class="custom-file-label" for="inputGroupFile01"></label>
            </div>
            <button type="submit" class="form-group btn btn-primary">Envoyer</button>
            @if(Session::has('status'))
                <div class="form-group alert alert-success">
                    {{Session::get('status')}}
                </div>
            @endif
            @if ($errors->any())
                <div class="form-group alert alert-danger">
                    <ul style="margin-bottom: 0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
</div>
</body>
</html>



