<?php

namespace Database\Seeders\BuildingInfo;

use Illuminate\Database\Seeder;
use App\Models\BuildingInfo\FunctionalUse;
use DB;

class FunctionalUseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names =  array(
            [1, 'Residential'],
            [2, 'Mixed (Residential, Commercial, Office uses)'],
            [3, 'Educational'],
            [4, 'Health Institution'],
            [5, 'Commercial'],
            [6, 'Industrial'],
            [7, 'Public Institution'],
            [8, 'Government Institution'],
            [9, 'Recreational Institution'],
            [10, 'Social Institution'],
            [11, 'Cultural Institution'],
            [12, 'Religious'],

        );

        foreach ($names as $name) {

            $existFunctionalUse =  DB::table('building_info.functional_uses')
                ->where('name', $name[1])
                ->first();
            if (!$existFunctionalUse) {
                FunctionalUse::create([
                    'id' => $name[0],
                    'name' => $name[1],
                ]);
            }
        }
    }
}
