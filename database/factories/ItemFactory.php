<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Support\Str;
use App\Models\ItemCategroy;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'commercial_name' => $this->faker->name,
            'category_id' => ItemCategroy::pluck('id')->random(),
            'warehouse_id' => Warehouse::pluck('id')->random(),
            'qty' => rand(1, 500),
            'price' => rand(10, 5000),
            'code' => 'BBT002'
        ];
    }
}
