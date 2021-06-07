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

        $this->call([
            ClientAppSeeder::class,
        ]);

        \App\Models\Campaign::factory(10)->create();

        $this->call([
            CampaignSeeder::class,
        ]);

        \App\Models\Package::factory(10)->create();

        $this->call([
            PackageSeeder::class,
        ]);

        \App\Models\Tag::factory(10)->create();

        $this->call([
            TagSeeder::class,
        ]);

        \App\Models\Taggable::factory(10)->create();

        $this->call([
            TaggableSeeder::class,
        ]);

        \App\Models\Category::factory(10)->create();

        $this->call([
            CategorySeeder::class,
        ]);

        \App\Models\Categorizable::factory(10)->create();

        $this->call([
            CategorizableSeeder::class,
        ]);

        \App\Models\Campanile::factory(10)->create();

        $this->call([
            CampanileSeeder::class,
        ]);

        // PackageType

        $this->call([
            PackageTypeSeeder::class,
        ]);

        // AnswerType

        $this->call([
            AnswerTypeSeeder::class,
        ]);

        \App\Models\PackageQuestion::factory(10)->create();

        $this->call([
            PackageQuestionSeeder::class,
        ]);

        \App\Models\PackageQuestionChoice::factory(10)->create();

        $this->call([
            PackageQuestionChoiceSeeder::class,
        ]);

    }
}
