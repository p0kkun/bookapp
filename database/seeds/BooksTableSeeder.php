<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            ['title' => '鬼滅の刃', 'author' => '吾峠 呼世晴', 'price' => 300],
            ['title' => 'ONE PIECE カラー版', 'author' => '尾田栄一郎', 'price' => 500],
            ['title' => 'BLEACH モノクロ版', 'author' => '久保帯人', 'price' => 500],
            ['title' => 'マッシュル-MASHLE-', 'author' => '田畠裕基', 'price' => 500],
            ['title' => '家庭教師ヒットマンREBORN！ モノクロ版', 'author' => '天野明', 'price' => 500],
            ['title' => '約束', 'author' => '立石志摩', 'price' => 500],
            ['title' => 'トリコ', 'author' => '島袋光年', 'price' => 500],
            ['title' => 'チーズの王子様', 'author' => '渡瀬悠宇', 'price' => 500],
            ['title' => 'HUNTER×HUNTER', 'author' => '富坚义博', 'price' => 500],
            ['title' => 'ブラッククローバー', 'author' => '田畠裕基', 'price' => 300],
            ['title' => 'ブラッククローバー', 'author' => '田畠裕基', 'price' => 300],
            ['title' => '鬼滅の刃', 'author' => '吾峠 呼世晴', 'price' => 300],
            ['title' => 'ONE PIECE カラー版', 'author' => '尾田栄一郎', 'price' => 500],
            ['title' => 'BLEACH モノクロ版', 'author' => '久保帯人', 'price' => 500],
            ['title' => 'マッシュル-MASHLE-', 'author' => '田畠裕基', 'price' => 500],
            ['title' => '家庭教師ヒットマンREBORN！ モノクロ版', 'author' => '天野明', 'price' => 500],
            ['title' => '約束', 'author' => '立石志摩', 'price' => 500],
            ['title' => 'トリコ', 'author' => '島袋光年', 'price' => 500],
            ['title' => 'チーズの王子様', 'author' => '渡瀬悠宇', 'price' => 500],
            ['title' => 'HUNTER×HUNTER', 'author' => '富坚义博', 'price' => 500],
            ['title' => 'ブラッククローバー', 'author' => '田畠裕基', 'price' => 300],
            ['title' => 'ブラッククローバー', 'author' => '田畠裕基', 'price' => 300],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
