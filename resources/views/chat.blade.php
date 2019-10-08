<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
    <style>
        .list-group {
            overflow-y: scroll;
            height: 300px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row" id="app">
        <div class="offset-4 col-4 offset-sm-1 col-sm-10">
            <li class="list-group-item active">Chat Room</li>
            <ul class="list-group" v-chat-scroll>

                <message v-for="value,index in chat.message"
                         :key="value.index"
                         :color="chat.color[index]"
                         :user="chat.user[index]">@{{ value }}
                </message>

            </ul>
            <input type="text" v-model="message" class="form-control" placeholder="Type your message"
                   @keyup.enter="send">
        </div>

    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>