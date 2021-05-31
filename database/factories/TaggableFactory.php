<?php

namespace Database\Factories;

use App\Models\ClientApp;
use App\Models\Package;
use App\Models\Survey;
use App\Models\Tag;
use App\Models\Taggable;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaggableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Taggable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tag = Tag::factory()->create();

        $package = Package::factory()->create();

        return [
            'tag_id' => function () use ($tag) {
                return $tag->id;
            },
            'taggable_id' => function () use ($package) {
                return $package->id;
            },
            'taggable_type' => function () {
                return Package::class;
            },
        ];
    }
}
