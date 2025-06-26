<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー検索</title>
</head>
<body>
    <h2>ユーザー検索</h2>
    <p>ユーザーIDを入力して、該当するユーザー情報を表示します。</p>

    <!-- id入力 -->
    <form action="{{ route('user') }}" method="GET">
        @csrf
        <label for="user_id">ユーザーID:</label>
        <input type="text" id="user_id" name="user_id" required>
        <button type="submit">検索</button>
    </form>

    <h2>ユーザー情報</h2>
    <!-- ユーザー情報表示 -->
    @if(isset($user))
        <p>ユーザーID: {{ $user->id }}</p>
        <p>お名前: {{ $user->name }}</p>
        <p>メールアドレス: {{ $user->email }}</p>
        <p>メッセージ: {{ $user->message }}</p>
    @elseif(request()->has('user_id'))
        <p>該当するユーザーが見つかりませんでした。</p>
    @endif
</body>
</html>
