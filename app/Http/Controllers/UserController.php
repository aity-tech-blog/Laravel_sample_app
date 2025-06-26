<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_search(Request $request)
    {
        // ユーザー情報のサンプルデータ
        // 実際のアプリケーションでは、データベースから取得する
        $users = [
            1 => (object)[
                'id' => 1,
                'name' => '山田 太郎',
                'email' => 'taro@example.com',
                'message' => 'こんにちは、山田です。',
            ],
            2 => (object)[
                'id' => 2,
                'name' => '佐藤 花子',
                'email' => 'hanako@example.com',
                'message' => 'おはようございます！',
            ],
        ];
        // リクエストからユーザーIDを取得
        $userId = $request->input('user_id');
        // ユーザーIDが指定されていない場合は、nullを返す
        $user = $users[$userId] ?? null;

        return view('user_info', compact('user'));
    }
}