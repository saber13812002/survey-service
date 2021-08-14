<?php

namespace Database\Seeders\Migrations;

use App\Models\Exam;
use App\Models\PackageType;
use App\Models\Poll;
use App\Models\Quiz;
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
        $itemTypes = array(
            ["name" => "نظرسنجی", "type" => Survey::class],
//            ["name" => "آزمون", "type" => Exam::class, "is_active" => 0],
//            ["name" => "کوییز", "type" => Quiz::class],
//            ["name" => "رای گیری", "type" => Poll::class, "is_active" => 0]
        );

        foreach ($itemTypes as $item) {
            PackageType::query()->create(
                array(
                    "title" => $item['name'],
                    "model_name" => $item['type'])
//                    "is_active" => $item['is_active'],
                );
        }
    }
}
