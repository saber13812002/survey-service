<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\Campanile;
use App\Models\ClientApp;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampanileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Campanile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $campaign = Campaign::factory()->create();

        $package = Package::factory()->create();

        return [
            'campaign_id' => function () use ($campaign) {
                return $campaign->id;
            },
            'campanile_id' => function () use ($package) {
                return $package->id;
            },
            'campanile_type' => function () {
                return Package::class;
            },
        ];

    }
}
