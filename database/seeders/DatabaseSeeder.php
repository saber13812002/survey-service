<?php

namespace Database\Seeders;

use App\Models\PackageType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\ClientApp::factory(10)->create();
        \App\Models\Campaign::factory(10)->create();
        \App\Models\Package::factory(10)->create();
        \App\Models\Tag::factory(10)->create();
        \App\Models\Taggable::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Categorizable::factory(10)->create();
        \App\Models\Campanile::factory(10)->create();

        $this->call([
            PackageTypeSeeder::class,
        ]);

        $this->call([
            AnswerTypeSeeder::class,
        ]);

    }
}
