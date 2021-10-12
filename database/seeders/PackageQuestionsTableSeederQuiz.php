<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PackageQuestionsTableSeederQuiz extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('package_questions')->insert(array (
            0 =>
            array (
                'package_id' => 201,
                'title' => 'کدام کلمه در متن سوال وجود دارد؟',
                'description' => 'بلند آهاردار. مثل فرفره می‌جنبید. چشم‌هایش برق عجیبی می‌زد که از همان بالا به ناظم انداختم که تازه حالش سر.',
                'answer_type_id' => 3,
                'order' => 0,
                'weight' => 1,
                'is_active' => 1,
                'source_id' => NULL,
                'event_ids' => NULL,
                'created_at' => '2021-09-26 07:57:25',
                'updated_at' => '2021-09-26 07:57:25',
                'deleted_at' => NULL,
            )
        ));
    }
}
