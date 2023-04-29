<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();
        $departments = ['RA', 'SD', 'SMP', 'SMA', 'TAHFIZH', 'YAYASAN' ];
        $departments_code = ['PG', 'ES', 'JS', 'HS', 'TQ', 'AB' ];

        for($i = 0; $i < count($departments); $i++) {
            Department::create([
                'name' => $departments[$i],
                'code' => $departments_code[$i]
            ]);

        }

        // $floors = ['I', 'II', 'III', 'IV'];
        // for($i = 0; $i < count($floors); $i++) {
        //     Floor::create([
        //         'name' => $floors[$i]
        //     ]);
        // }

        // Inventory::create([
        //     'code_inventory' => 'EIE-AC01-JS3/32-01',
        //     'purchased_in' => "2021-01-01",
        //     'product_id' => 1,
        //     'room_id' => 1
        // ]);
        
        // Inventory::create([
        //     'code_inventory' => 'EIE-AC01-JS3/32-02',
        //     'purchased_in' => "2022-01-01",
        //     'product_id' => 1,
        //     'room_id' => 1
        // ]);
        
        // Inventory::create([
        //     'code_inventory' => 'ICT-PC01-JS1/06-01',
        //     'purchased_in' => "2022-01-01",
        //     'product_id' => 5,
        //     'room_id' => 1
        // ]);
    }
}
