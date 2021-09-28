<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeederQuiz extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert(array (
            0 =>
            array (
                'parent_id' => NULL,
                'title' => 'دسته بندی کد 21 گواهی نامه رژیم',
                'description' => NULL,
                'created_at' => '2021-09-28 05:23:22',
                'updated_at' => '2021-09-28 05:23:22',
                'deleted_at' => NULL,
            ),
        ));
    }
}
