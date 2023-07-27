<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Article::create(
      [
        'image' => '/images/news/news-1.jpg',
      ]
    );
    Article::create(
      [
        'image' => '/images/news/news-2.jpg',
      ]
    );
  }
}
