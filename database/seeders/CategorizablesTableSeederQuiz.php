<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorizablesTableSeederQuiz extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categorizables')->insert(array (
            0 =>
            array (
                'category_id' => 21,
                'categorizable_id' => 201,
                'categorizable_type' => 'App\\Models\\Package',
                'created_at' => NULL,
                'updated_at' => NULL,
            )
        ));
    }
}
