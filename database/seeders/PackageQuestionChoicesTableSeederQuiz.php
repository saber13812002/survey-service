<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PackageQuestionChoicesTableSeederQuiz extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('package_question_choices')->insert(array (
            0 =>
            array (
                'question_id' => 101,
                'is_correct' => 0,
                'title' => 'سرسره',
                'description' => NULL,
                'order' => 4,
                'weight' => 1,
                'is_active' => 1,
                'created_at' => '2021-09-28 05:45:22',
                'updated_at' => '2021-09-28 05:45:22',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'question_id' => 101,
                'is_correct' => 0,
                'title' => 'برگ',
                'description' => NULL,
                'order' => 3,
                'weight' => 1,
                'is_active' => 1,
                'created_at' => '2021-09-28 05:45:22',
                'updated_at' => '2021-09-28 05:45:22',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'question_id' => 101,
                'is_correct' => 0,
                'title' => 'فرفرفره',
                'description' => NULL,
                'order' => 2,
                'weight' => 1,
                'is_active' => 1,
                'created_at' => '2021-09-28 05:45:22',
                'updated_at' => '2021-09-28 05:45:22',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'question_id' => 101,
                'is_correct' => 1,
                'title' => 'آهاردار',
                'description' => NULL,
                'order' => 1,
                'weight' => 1,
                'is_active' => 1,
                'created_at' => '2021-09-28 05:45:22',
                'updated_at' => '2021-09-28 05:45:22',
                'deleted_at' => NULL,
            ),
        ));
    }
}
