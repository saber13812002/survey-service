<?php

namespace Database\Factories;

use App\Models\ClientApp;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientAppFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClientApp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'App ' . $this->faker->name,
            'description' => $this->faker->paragraph,
            'logo' => $this->faker->imageUrl(300,200),
        ];
    }
}
