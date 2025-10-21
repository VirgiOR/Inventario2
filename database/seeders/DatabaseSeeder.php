<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
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

        User::factory()->create([
            'name' => 'Virginia Ortiz',
            'email' => 'polgarilla@yahoo.es',
            'password'  => bcrypt('123456789'),
        ]);

        $this->call([
            CategorySeeder::class,
        ]);

        Product::factory(100)->create();
    }


}
