<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warehouses')->delete();
        $warehouses = [
            ['id' => '1', 'name' => 'warehouse one'],
            ['id' => '2', 'name' => 'warehouse two'],


        ];

        foreach ($warehouses as $item) {
            Warehouse::create($item);
        }
    }
}
