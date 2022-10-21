<?php
namespace App\Database\Seeds;

use App\Models\WineType;
use Illuminate\Database\Seeder;

class WineTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ["name" => "Tinto"],
            ["name" => "Branco"],
            ["name" => "Rosé"],
            ["name" => "Espumante"],
            ["name" => "Licoroso"]
        ];

        WineType::insert($types);
    }
}
