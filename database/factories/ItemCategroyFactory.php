<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ItemCategroy;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemCategroyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemCategroy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_name' => $this->faker->name,
        ];
    }
}
