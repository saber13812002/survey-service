<?php

namespace Database\Seeders;

use App\Models\PackageType;
use App\Models\Survey;
use Illuminate\Database\Seeder;

class PackageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemTypes = array(["name" => "نظرسنجی", "type" => Survey::class]);

        foreach ($itemTypes as $item) {
            PackageType::query()->create(array("title" => $item['name'], "model_name" => $item['type']));
        }
    }
}
