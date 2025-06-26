<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    /**
     * テスト用ページの表示.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('hello', ['name' => 'ゲスト']);
    }
}
