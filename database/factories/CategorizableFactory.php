<?php

namespace Database\Factories;

use App\Models\Categorizable;
use App\Models\Category;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategorizableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Categorizable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = Category::query()->get();

        $packages = Package::query()->get();

        foreach ($categories as $category) {
            foreach ($packages as $package) {
                return [
                    'category_id' => function () use ($category) {
                        return $category->id;
                    },
                    'categorizable_id' => function () use ($package) {
                        return $package->id;
                    },
                    'categorizable_type' => function () {
                        return Package::class;
                    },
                ];
            }
        }
    }
}
