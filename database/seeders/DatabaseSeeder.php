<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\ArticleTranslation;
use App\Models\Language;
use App\Models\Role;
use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call([
          NavbarSeeder::class,
          RoleSeeder::class,
          LanguageSeeder::class,
          ImageSeeder::class,
          MainBlockSeeder::class,
          PageSeeder::class,
          // ArticleSeeder::class,
          // ArticleTranslationSeeder::class,
        ]);

        Article::factory(100)
        ->has(ArticleTranslation::factory()
        ->count(Language::all()->count()))
        ->create();

        User::create([
          'email' => 'manager@manager.com',
          'name' => 'manager',
          'password' => Hash::make('manager'),
          'role_id' => Role::where('role', 'manager')->first()->id,
        ]);
  
        User::create([
          'email' => 'admin@admin.com',
          'name' => 'admin',
          'password' => Hash::make('admin'),
          'role_id' => Role::where('role', 'admin')->first()->id,
        ]);

    }
}
