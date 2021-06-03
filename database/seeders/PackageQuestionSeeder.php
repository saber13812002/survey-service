<?php

namespace Database\Seeders;

use App\Models\PackageQuestion;
use Illuminate\Database\Seeder;

class PackageQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PackageQuestion::factory()
            ->count(50)
            ->create();
    }
}
