<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Page;
use App\Models\PageTranslation;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $presets = [
        'main' => [
          'title' => 'Главная',
          'meta_title' => 'Главная Самого лучшего сайта',
        ],
      ];
      $languages = Language::pluck('id');
      $mainBlocks = [
        [
          'title' => 'Детский сад №10 г.Минска',
          'description' => 'Добро пожаловать в наш детский сад! Мы предлагаем любящую и заботливую обстановку, где ваш ребенок сможет играть, учиться и расцветать. Наша команда профессионалов с горячим сердцем и широкими знаниями поможет развить навыки вашего ребенка, создавая основу для будущего успеха.',
        ],
        [
          'title' => 'Дзіцячы сад №10 г.Мінска',
          'description' => 'Сардэчна запрашаем у наш дзіцячы сад! Мы прапануем кахаючую і клапатлівую абстаноўку, дзе ваша дзіця зможа гуляць, вучыцца і расквітаць. Наша каманда прафесіяналаў з гарачым сэрцам і шырокімі ведамі дапаможа развіць навыкі вашага дзіцяці, ствараючы аснову для будучага поспеху.',
        ],
      ];

      foreach($presets as $slug => $page) {
        $row_page = Page::where('slug', $slug)->first();
        if ($row_page === null) {
          $page['slug'] = $slug;
          Page::create($page);
        }
      }

      
      foreach($mainBlocks as $key => $value) {
        PageTranslation::create([
          'title' => $value['title'],
          'description' => $value['description'],
          'page_id' => 1,
          'language_id' => $languages[$key],
        ]);
      };
    }
}
