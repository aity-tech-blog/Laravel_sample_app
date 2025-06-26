<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello Laravel</title>
</head>
<body>
    <h1>Hello Laravel!</h1>
    <p>これはDBなしのテストページです。</p>
    <p>ユーザー名：{{ $name }}</p>
    
    <!-- ユーザーと問い合わせへのリンク -->
    <h2>他サンプルページへのリンク</h2>
    <ul>
        <li><a href="{{ route('user') }}">ユーザー情報</a></li>
        <li><a href="{{ route('contact.form') }}">お問い合わせ</a></li>
    </ul>
</body>
</html>