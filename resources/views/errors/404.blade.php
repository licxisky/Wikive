<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        *{padding:0;margin:0}
        body{background:#fff;font-family:'微软雅黑';color:#333;font-size:16px}
        .system-message{padding:30px 48px 60px 48px;margin:80px auto;width:550px;border:1px solid #DDD;background-color:#FFF;-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px}
        .system-message .jump{padding-top:10px;padding-left:30px}
        .system-message .jump a{color:#333}
        .system-message .success,.system-message .error{line-height:1.8em;font-size:28px;padding-left:30px; text-align: center}
        .system-message .detail{font-size:12px;line-height:20px;margin-top:12px;display:none}
    </style>
</head>

<body>
<div class="system-message">
    <p style="font-size: 20em">404</p>
    <p class="error">您访问的页面不存在</p>
    <p class="error"><a href="{{ route('home') }}">首页</a></p>
</div>
</body>
</html>