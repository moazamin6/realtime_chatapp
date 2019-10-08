<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Template</title>
</head>

<body>

<form action="{{route('broadcast_post')}}" method="post">

    @csrf
    <input type="text" name="txt">
    <input type="submit" value="send data">
</form>
</body>

</html>