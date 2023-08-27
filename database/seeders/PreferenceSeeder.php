<?php

namespace Database\Seeders;

use App\Models\Preference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreferenceSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $names = ['ВОЗМОЖНОСТЬ ДИСТАНЦИОННОГО ОБУЧЕНИЯ', 'ПОСТУПЛЕНИЕ БЕЗ ВСТУПИТЕЛЬНЫХ ИСПЫТАНИЙ', 'ОПЛАТА ОБУЧЕНИЯ ЛЮБЫМ СПОСОБОМ'];

    $desc = 'Lorem ipsum dolor sit amet consectetur. Nullam interdum ultricies bibendum dolor suscipit. Enim facilisis condimentum nisi maecenas viverra pellentesque.';
    $arr = [];
    foreach ($names as $name) {
      $arr[] = ['name' => $name, 'desc' => $desc];
    }

    Preference::create([
      'name' => 'Преимущества',
      'list' => json_encode($arr),
    ]);
  }
}
