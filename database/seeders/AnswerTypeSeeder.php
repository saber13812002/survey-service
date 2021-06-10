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
            array("title" => "تشریحی"),
            array("title" => "دو گزینه ای"),
            array("title" => "چند گزینه ای"),
        );

        foreach ($itemTypes as $item) {
            AnswerType::query()->create(array("title" => $item['title']));
        }
    }
}
