<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\MainBlock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $languages = Language::pluck('id');

      $mainBlocks = [
        [
          'title' => 'Детский сад №10 г.Минска',
          'intro' => 'Добро пожаловать в наш детский сад! Мы предлагаем любящую и заботливую обстановку, где ваш ребенок сможет играть, учиться и расцветать. Наша команда профессионалов с горячим сердцем и широкими знаниями поможет развить навыки вашего ребенка, создавая основу для будущего успеха.',
        ],
        [
          'title' => 'Дзіцячы сад №10 г.Мінска',
          'intro' => 'Сардэчна запрашаем у наш дзіцячы сад! Мы прапануем кахаючую і клапатлівую абстаноўку, дзе ваша дзіця зможа гуляць, вучыцца і расквітаць. Наша каманда прафесіяналаў з гарачым сэрцам і шырокімі ведамі дапаможа развіць навыкі вашага дзіцяці, ствараючы аснову для будучага поспеху.',
        ],
      ];
        
    }
}
