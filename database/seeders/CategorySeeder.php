<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\ItemCategroy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemCategroy::factory()->count(3)->create()->each(function ($u) {
            $u->items()
                ->saveMany(
                    Item::factory()->count(30)->make()
                );
        });
    }
}
