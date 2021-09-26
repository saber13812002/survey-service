<?php

namespace Database\Factories;

use App\Models\PackageQuestion;
use App\Models\PackageQuestionChoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageQuestionChoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PackageQuestionChoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $packageQuestion = PackageQuestion::factory()->create();

        return [
            'title' => 'گزینه ' . $this->faker->name,
            'description' => $this->faker->realText(200),
            'question_id' => function () use ($packageQuestion) {
                return $packageQuestion->id;
            },
            'order' => function () use ($packageQuestion) {
                return 1;
            },
        ];
    }
}
