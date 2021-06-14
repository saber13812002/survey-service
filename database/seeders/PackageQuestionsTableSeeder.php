<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PackageQuestionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        // \DB::table('package_questions')->delete();

        \DB::table('package_questions')->where('id', 61)->update(['package_id' => 161]);
        \DB::table('package_questions')->where('id', 62)->update(['package_id' => 161]);
        \DB::table('package_questions')->where('id', 63)->update(['package_id' => 161]);
        \DB::table('package_questions')->where('id', 64)->update(['package_id' => 161]);
        \DB::table('package_questions')->where('id', 65)->update(['package_id' => 161]);
        \DB::table('package_questions')->where('id', 66)->update(['package_id' => 161]);
        \DB::table('package_questions')->where('id', 67)->update(['package_id' => 161]);
        \DB::table('package_questions')->where('id', 71)->update([
            'package_id' => 161,
            'answer_type_id' => 2,
            'correct_choice_id' => null
        ]);
    }
}
