<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = new Category();
        $category->category = "Animals";
        $category->save();
        $category = new Category();
        $category->category = "Security";
        $category->save();
    }
}
