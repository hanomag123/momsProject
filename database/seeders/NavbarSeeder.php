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
            'name' => 'Main',
            'route' => 'main',
            'ordering' => 1,
        ],
        [
            'name' => 'Window',
            'route' => 'onewindow',
            'ordering' => 2,
        ],
        [
            'name' => 'About US',
            'route' => 'aboutus',
            'ordering' => 3,
        ]
    ];

    foreach ($links as $navbar) {
        Navbar::create($navbar);
    }
    }
}
