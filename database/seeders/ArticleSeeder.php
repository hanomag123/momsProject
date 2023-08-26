<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class ArticleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Article::create(
    //   [
    //     'image' => '/images/news/news-1.jpg',
    //   ]
    // );
    // Article::create(
    //   [
    //     'image' => '/images/news/news-2.jpg',
    //   ]
    // );

    // $urls = [
    //   'http://ddu10.minsk.edu.by/ru/main.aspx?guid=13283',
    //   'http://ddu10.minsk.edu.by/ru/main.aspx?guid=13263',
    //   'http://ddu10.minsk.edu.by/ru/main.aspx?guid=13243',
    //   'http://ddu10.minsk.edu.by/ru/main.aspx?guid=13233',
    //   'http://ddu10.minsk.edu.by/ru/main.aspx?guid=13293',
    // ];

    // foreach($urls as $url) {
    //   Artisan::call('app:parse-site', ['url' => $url]);
    // };


    $articles = Article::factory(100)
    ->create();

    foreach($articles as $article) {
      $article = $article->toArray();
      unset($article['id']);
      $article['locale_id'] = 2;
      $article['title'] = str_replace('рус', 'бел', $article['title'] );
      Article::create($article);
      $article = [];
    }
  }
}
