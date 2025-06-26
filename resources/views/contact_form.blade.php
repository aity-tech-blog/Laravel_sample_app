<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問い合わせフォーム</title>
</head>
<body>
    <!-- 送信成功メッセージ -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <h2>お問い合わせフォーム</h2>
    <p>以下のフォームに必要事項を入力してください。</p>
    <form action="{{ route('contact.confirm') }}" method="POST">
        @csrf
        <div>
            <label for="name">お名前:</label><br>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label for="email">メールアドレス:</label><br>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="message">メッセージ:</label><br>
            <textarea id="message" name="message" required>{{ old('message') }}</textarea>
        </div>
        <button type="submit" style="padding: 10px 20px; margin-top: 10px;">確認</button>
    </form>
</body>
</html>