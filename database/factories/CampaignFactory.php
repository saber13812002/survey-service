<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\ClientApp;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'title' => 'کمپین ' . $this->faker->name,
            'description' => $this->faker->paragraph,
            'client_app_id' => 0,
        ];
    }
}
