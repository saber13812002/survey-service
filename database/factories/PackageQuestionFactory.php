<?php

namespace Database\Factories;

use App\Models\Package;
use App\Models\PackageQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageQuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PackageQuestion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $package = Package::factory()->create();

        return [
            'title' => 'سوال ' . $this->faker->name,
            'description' => $this->faker->paragraph,
            'package_id' => function () use ($package) {
                return $package->id;
            },
            'answer_type_id' => 1
        ];
    }
}
