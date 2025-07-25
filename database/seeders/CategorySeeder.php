<?php

namespace Database\Seeders;

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
            ['name' => 'Narrativa', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Saggistica', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Biografie', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Poesia', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Arte e Design', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Scienze', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tecnologia', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Salute e Benessere', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cucina', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Musica', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Letteratura', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gialli e Thriller', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
