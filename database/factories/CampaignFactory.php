<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\ClientApp;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ybazli\Faker\Faker;

class CampaignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Campaign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
//        $faker = new Faker();
        return [
            'title' => 'کمپین ' . $this->faker->name,
            'description' => $this->faker->realText(200),
            'client_app_id' => 0,
        ];
    }
}
