<?php

namespace Database\Seeders;

use App\Models\AnswerType;
use Illuminate\Database\Seeder;

class AnswerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemTypes = array(
            array("title" => "تشریحی", "alias" => "DESCRIPTIVE", "is_active" => 0),
            array("title" => "دو گزینه ای", "alias" => "TWO_OPTIONS", "is_active" => 0),
            array("title" => "چند گزینه ای", "alias" => "MULTI_OPTIONS", "is_active" => 1),
            array("title" => "چند جوابی", "alias" => "MULTIPLE_CHOICES", "is_active" => 0),
        );

        foreach ($itemTypes as $item) {
            AnswerType::query()->create(
                array(
                    "title" => $item['title'],
                    "alias" => $item['alias'],
                    "is_active" => $item['is_active']
                ));
        }
    }
}
