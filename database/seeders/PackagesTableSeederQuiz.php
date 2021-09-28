<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PackagesTableSeederQuiz extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('packages')->insert(array (
            0 =>
            array (
                'client_app_id' => 0,
                'parent_id' => NULL,
                'packable_id' => 3,
                'packable_type' => 'App\\Models\\Quiz',
                'title' => 'پکیج گواهی نامه رژیم کد 201 سیدر',
                'description' => 'پکیج گواهی نامه رژیم کد 201 سیدر',
                'first_text' => 'پکیج گواهی نامه رژیم کد 201 سیدر',
                'final_text' => 'پکیج گواهی نامه رژیم کد 201 سیدر',
                'started_at' => '2021-09-26',
                'finished_at' => '2021-10-17',
                'is_active' => 1,
                'is_deletable' => 1,
                'created_at' => '2021-09-26 07:57:24',
                'updated_at' => '2021-09-26 07:57:24',
                'deleted_at' => NULL,
            ),
        ));


    }
}
