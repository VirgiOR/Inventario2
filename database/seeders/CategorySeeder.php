<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronicos', 'description' => 'Articulos electronicos y gadgets'],
            ['name' => 'Ropa', 'description' => 'Vestimenta para todas las edades'],
            ['name' => 'Hogar', 'description' => 'Articulos para el hogar y decoracion'],
            ['name' => 'Deportes', 'description' => 'Equipamiento y ropa deportiva'],
            ['name' => 'Libros', 'description' => 'Libros de diversos generos y autores'],
        ]; 
        
        foreach ($categories as $category) {
            Category::create($category);
        }   
    } 
}
