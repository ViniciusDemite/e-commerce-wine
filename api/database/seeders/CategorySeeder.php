<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ["name" => "Tinto"],
            ["name" => "Branco"],
            ["name" => "Rosé"],
            ["name" => "Espumante"],
            ["name" => "Seco"],
            ["name" => "Suava"],
            ["name" => "Demi-seco"],
            ["name" => "Fortificado"]
        ];

        Category::insert($categories);
    }
}
