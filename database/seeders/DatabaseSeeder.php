<?php

namespace Database\Seeders;

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
        User::factory()->create([
            'username' => 'admin',
            'is_admin' => 1,
        ]);

        User::factory(10)->create();

        $this->call([
            CategorySeeder::class,
            ColorSeeder::class,
            BrandModelSeeder::class,
            ProductSeeder::class,
        ]);

    }
}
