<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    // 入力フォーム表示
    public function form(Request $request)
    {
        // POSTから戻ってきた場合は、入力値を old に戻す
        if ($request->isMethod('post')) {
            return redirect()->route('contact.form')->withInput();
        }
        return view('contact_form');
    }

    // 確認画面表示
    public function confirm(Request $request)
    {
        $data = $request->only(['name', 'email', 'message']);
        return view('contact_confirm', $data);
    }

    // 送信処理
    public function send(Request $request)
    {
        $data = $request->only(['name', 'email', 'message']);

        // デバッグログに出力（storage/logs/laravel.log に記録される）
        Log::debug('お問い合わせ送信内容:', $data);

        // 成功メッセージと共にフォーム画面にリダイレクト
        return redirect()->route('contact.form')->with('success', 'お問い合わせを送信しました。');
    }
}
