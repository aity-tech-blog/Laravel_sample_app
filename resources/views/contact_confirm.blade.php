<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問い合わせ確認</title>
</head>
<body>
    <h2>お問い合わせ内容の確認</h2>
    <ul>
        <li>お名前: {{ $name }}</li>
        <li>メールアドレス: {{ $email }}</li>
        <li>メッセージ: {{ $message }}</li>
    </ul>
    <p>この内容で送信しますか？</p>
    <form action="{{ route('contact.send') }}" method="POST">
        @csrf
        <input type="hidden" name="name" value="{{ $name }}">
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="message" value="{{ $message }}">
        <button type="submit" style="padding: 10px 20px; margin-top: 10px;">送信</button>
        
    </form>
    <form action="{{ route('contact.form') }}" method="POST" style="display: inline;">
        @csrf
        <input type="hidden" name="name" value="{{ $name }}">
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="message" value="{{ $message }}">
        <button type="submit" style="padding: 10px 20px; margin-top: 10px;">修正する</button>
    </form>
</body>
</html>