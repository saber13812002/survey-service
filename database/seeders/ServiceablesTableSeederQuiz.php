<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceablesTableSeederQuiz extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('serviceables')->insert(array (
            0 =>
            array (
                'package_id' => 201,
                'serviceable_id' => 1024,
                'serviceable_type' => 'MEDYAR/TEMPLATE',
                'created_at' => '2021-09-28 06:57:03',
                'updated_at' => '2021-09-28 06:57:03',
            ),
        ));
    }
}
