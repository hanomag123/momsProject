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
        Preference::create([
          'name' => 'название 1',
          'description' => 'текст 1',
        ]);

        Preference::create([
          'name' => 'название 2',
          'description' => 'текст 2',
        ]);
    }
}
