<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Pemrograman', 'Jaringan', 'Multimedia', 'Database'];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}