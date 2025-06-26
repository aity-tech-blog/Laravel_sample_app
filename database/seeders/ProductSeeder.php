<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //　データベースをリセット
        \DB::table('products')->truncate();
        // 現在時刻を取得
        $now = Carbon::now();
        // Productテーブルへサンプルデータ挿入
        \App\Models\Product::insert([
            ['name' => 'Laravel Tシャツ', 'price' => 2500, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Laravel ステッカー', 'price' => 300, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
