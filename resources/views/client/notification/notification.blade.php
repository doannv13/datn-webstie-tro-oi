<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xác nhận đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: black;
        }
        .email-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="email-container">
        <p>Xin chào, {{ $username }}!</p>
        <p class="greeting">Xác nhận đơn hàng</p>
        <p>Bạn có 1 đơn hàng cần xác nhận,đơn hàng cần xác nhận có mã - {{ $verification }}</p>
        <p>Vui lòng truy cập website để xem chi tiết: <a style="color:skyblue"  href="http://localhost:8000">Bấm ở đây!</a></p>
        <ul class="sender-info">
            <li>Công ty:Trọ Ơi</li>
            <li>Số điện thoại: 036.37.38.586</li>
            <li>Email: hotro.trooi.datn@gmail.com</li>
        </ul>
    </div>
</body>
</html>
