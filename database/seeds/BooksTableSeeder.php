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
            ['title' => '鬼滅の刃', 'author' => '吾峠 呼世晴', 'price' => rand(100, 2000)],
            ['title' => 'ONE PIECE カラー版', 'author' => '尾田栄一郎', 'price' => rand(100, 2000)],
            ['title' => 'BLEACH モノクロ版', 'author' => '久保帯人', 'price' => rand(100, 2000)],
            ['title' => 'マッシュル-MASHLE-', 'author' => '田畠裕基', 'price' => rand(100, 2000)],
            ['title' => '家庭教師ヒットマンREBORN！ モノクロ版', 'author' => '天野明', 'price' => rand(100, 2000)],
            ['title' => '約束', 'author' => '立石志摩', 'price' => rand(100, 2000)],
            ['title' => 'トリコ', 'author' => '島袋光年', 'price' => rand(100, 2000)],
            ['title' => 'チーズの王子様', 'author' => '渡瀬悠宇', 'price' => rand(100, 2000)],
            ['title' => 'HUNTER×HUNTER', 'author' => '富坚义博', 'price' => rand(100, 2000)],
            ['title' => 'ブラッククローバー', 'author' => '田畠裕基', 'price' => rand(100, 2000)],
            ['title' => 'ハイキュー!!', 'author' => '古舘春一', 'price' => rand(100, 2000)],
            ['title' => '東京喰種トーキョーグール', 'author' => '石田スイ', 'price' => rand(100, 2000)],
            ['title' => '進撃の巨人', 'author' => '諫山創', 'price' => rand(100, 2000)],
            ['title' => 'ナルト', 'author' => '岸本斉史', 'price' => rand(100, 2000)],
            ['title' => 'モブサイコ100', 'author' => 'ONE', 'price' => rand(100, 2000)],
            ['title' => 'デスノート', 'author' => '大場つぐみ', 'price' => rand(100, 2000)],
            ['title' => '七つの大罪', 'author' => '鈴木央', 'price' => rand(100, 2000)],
            ['title' => '銀魂', 'author' => '空知英秋', 'price' => rand(100, 2000)],
            ['title' => '僕のヒーローアカデミア', 'author' => '堀越耕平', 'price' => rand(100, 2000)],
            ['title' => '約束のネバーランド', 'author' => '白井カイウ', 'price' => rand(100, 2000)],
            ['title' => 'ゴールデンカムイ', 'author' => '野田サトル', 'price' => rand(100, 2000)],
            ['title' => '暗殺教室', 'author' => '松井優征', 'price' => rand(100, 2000)],
            ['title' => 'ドラゴンボール', 'author' => '鳥山明', 'price' => rand(100, 2000)],
            ['title' => '僕だけがいない街', 'author' => '三部けい', 'price' => rand(100, 2000)],
            ['title' => 'ジョジョの奇妙な冒険', 'author' => '荒木飛呂彦', 'price' => rand(100, 2000)],
            ['title' => 'るろうに剣心', 'author' => '和月伸宏', 'price' => rand(100, 2000)],
            ['title' => 'サマータイムレンダ', 'author' => '田中靖規', 'price' => rand(100, 2000)],
            ['title' => '彼方のアストラ', 'author' => '篠原健太', 'price' => rand(100, 2000)],
            ['title' => 'ブルーピリオド', 'author' => '山口つばさ', 'price' => rand(100, 2000)],
            ['title' => 'キングダム', 'author' => '原泰久', 'price' => rand(100, 2000)],
            ['title' => 'スラムダンク', 'author' => '井上雄彦', 'price' => rand(100, 2000)]
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
