<?php

namespace Database\Seeders;

use App\Models\Documents;
use App\Models\Nasabah;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
        // 272
         Documents::factory(272)->create();
         Nasabah::factory(1067)->create();
         User::factory(15)->create();
    }
}
