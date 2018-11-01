<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
        
    </head>
    <body>
        <div class="container">
            <div class="form-inline">
                <input type="text" class="form-control" id="message" placeholder="">
                <button type="submit" class="btn btn-primary mb-2" id="sendMessage">发送</button>
            </div>
            <div id="serverList">

            </div>
        </div>
        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src='https://cdn.bootcss.com/socket.io/2.1.1/socket.io.js'></script>
        <script>
        // 如果服务端不在本机，请把127.0.0.1改成服务端ip
        var socket = io('http://laravel-demo.test:6001');
        // 当连接服务端成功时触发connect默认事件
        socket.on('connect', function(){
            console.log('connect success');

             // 服务端通过emit('chat message from server', $msg)触发客户端的chat message from server事件
            socket.on('chat message', function(msg){
                console.log(msg);
                $("#serverList").append('<p>'+msg+'</p>');
                $("#message").val('');
            });
        });

        $("#sendMessage").on('click',function(){
            var message = $("#message").val();
             // 触发服务端的chat message事件
            socket.emit('chat message', message);
        });
        
        </script>
    </body>
</html>
