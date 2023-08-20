<?php

namespace Database\Seeders;

use App\Models\Navbar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavbarSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $links = [
      [
        'name' => 'Главная',
        'route' => 'main'
      ],
      [
        'name' => 'События',
        'route' => 'events'
      ],
      [
        'name' => 'Новости',
        'route' => 'articles'
      ],
    ];

    foreach ($links as $navbar) {
      Navbar::create($navbar);
    }
  }
}
