<?php

namespace Database\Seeders;

use App\Models\ArticleTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArticleTranslation::create([
          'title' => 'Привет',
          'content' => 'Текст 1',
          'language_id' => 1,
          'article_id' => 1,
        ]);

        ArticleTranslation::create([
          'title' => 'Прывет',
          'content' => 'Текст 2',
          'language_id' => 2,
          'article_id' => 1,
        ]);
    }
}
