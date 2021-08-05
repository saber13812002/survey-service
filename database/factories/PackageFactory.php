<?php

namespace Database\Factories;

use App\Models\ClientApp;
use App\Models\Package;
use App\Models\Survey;
use Carbon\Carbon;
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
            'description' => $this->faker->paragraph,

            'first_text' => $this->faker->text,
            'final_text' => $this->faker->text,

            'started_at' => Carbon::today('Europe/London'),
            'finished_at' => Carbon::tomorrow('Europe/London')->addDay(20),

            'description' => $this->faker->paragraph,
            'client_app_id' => 0,
            'packable_id' => function () use ($survey) {
                return $survey->id;
            },
            'packable_type' => function () {
                return Survey::class;
            },
        ];
    }
}
