<?php

namespace Database\Factories;

use App\Models\ClientApp;
use App\Models\Package;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Package::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $survey = Survey::factory()->create();

        return [
            'title' => 'Package ' . $this->faker->name,
            'client_app_id' => function () {
                return ClientApp::factory()->create()->id;
            },
            'packable_id' => function () use ($survey) {
                return $survey->id;
            },
            'packable_type' => function () {
                return Survey::class;
            },
        ];
    }
}
