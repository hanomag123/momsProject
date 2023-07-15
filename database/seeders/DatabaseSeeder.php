<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use DB;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        $exists = DB::table('users')
        ->where('email', 'admin@admin.com')
        ->exists();
  
      if ($exists) {
        // Element exists in the table
      } else {
        // Element does not exist in the table
        \App\Models\User::factory()->create([
          'name' => 'admin',
          'email' => 'admin@admin.com',
          'password' => Hash::make('admin'),
          'isAdmin' => true,
        ]);
      }
    }
}
