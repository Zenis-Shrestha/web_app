<?php

namespace Database\Seeders\BuildingInfo;

use Illuminate\Database\Seeder;
use App\Models\BuildingInfo\StructureType;
use DB;

class StructureTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types =  array(
            [ 1 , 'RCC framed' ],
            [ 2 , 'Load bearing with cement mortar' ],
            [ 3 , 'Load bearing with mud/lime mortar' ],
            [ 4 , 'Wooden' ],
            [ 5 , 'Bamboo and mud' ],
            [ 6 , 'CGI' ],
            [ 7 , 'Steel structure' ],
            [ 8 , 'Other' ]
        );

     foreach ($types as $type) {

         $existStructureType =  DB::table('building_info.structure_types')
                 ->where('type', $type[1])
                 ->first();
         if(!$existStructureType) {
            StructureType::insert([
             'id' => $type[0],
             'type' => $type[1],
         ]);
         }
     }

    }
}
