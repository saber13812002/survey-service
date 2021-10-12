<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        // \DB::table('package_answers')->delete();

        \DB::table('client_apps')->insert(array(
            0 =>
                array(
                    'client_app_id' => 0,
                    'title' => 'behyar-admin',
                    'description' => 'behyar-admin',
                    'logo' => 'https://via.placeholder.com/300x200.png/006666?text=autem',
                    'created_at' => '2021-06-13 08:18:26',
                    'updated_at' => '2021-06-13 08:18:26',
                ),
        ));


    }
}
