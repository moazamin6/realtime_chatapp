<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Bootstrap Template</title>
</head>

<body>

<div id="app">
    <h1 v-bind="broadcastData">@{{ broadcastData }}</h1>
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>

</html>