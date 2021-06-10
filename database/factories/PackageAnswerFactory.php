<?php

namespace Database\Factories;

use App\Models\ClientApp;
use App\Models\Package;
use App\Models\PackageAnswer;
use App\Models\PackageQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageAnswerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PackageAnswer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $package = Package::factory()->create();

        return [
            'package_id' => function () use ($package) {
                return $package->id;
            },
            'question_id' => function () {
                return PackageQuestion::factory()->create()->id;
            },
            'title' => 'Answer ' . $this->faker->name,
            'description' => $this->faker->paragraph,
            'client_app_id' => function () {
                return 1;
            },
            'user_id' => function () {
                return 1;
            },
            'choice_id' => function () {
                return 1;
            },
        ];
    }
}
