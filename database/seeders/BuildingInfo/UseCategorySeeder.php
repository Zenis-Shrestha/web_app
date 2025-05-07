<?php

namespace Database\Seeders\BuildingInfo;

use Illuminate\Database\Seeder;
use App\Models\BuildingInfo\UseCategory;
use DB;

class UseCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [1, 'Residential', 1],

            [2, 'Mixed', 2],

            [3, 'School', 3],
            [4, 'College', 3],
            [5, 'University', 3],
            [6, 'Training Center', 3],

            [7, 'Hospital', 4],
            [8, 'Clinic Health Post', 4],

            [9, 'Shop', 5],
            [10, 'Restaurant', 5],
            [11, 'Hotel', 5],
            [12, 'Offices (Private)', 5],
            [13, 'Shopping mall', 5],
            [14, 'Hostel', 5],
            [15, 'Party Palace/Banquets', 5],

            [16, 'Industry', 6],
            [17, 'Factory', 6],
            [18, 'Warehouse', 6],
            [19, 'Workshop', 6],
            [20, 'Agriculture Farm', 6],

            [21, 'City hall', 7],
            [22, 'Public transportation terminal', 7],
            [23, 'Post office', 7],
            [24, 'Community Toilet', 7],
            [25, 'Public Toilet', 7],

            [26, 'Municipal Office', 8],
            [27, 'Ward Office', 8],
            [28, 'Government Office', 8],
            [29, 'Police Office', 8],
            [30, 'Fire Station', 8],
            [31, 'Army barrack', 8],
            [32, 'Jail', 8],

            [33, 'Club', 9],
            [34, 'Guthi house', 9],
            [35, 'Stadium', 9],
            [36, 'Cinema/theatre', 9],
            [37, 'Sports complex', 9],
            [38, 'Fitness center', 9],
            [39, 'Recreational center', 9],

            [40, 'NGO', 10],
            [41, 'INGO', 10],
            [42, 'Political Party', 10],
            [43, 'Old-aged Home', 10],
            [44, 'Orphanage', 10],

            [45, 'Museum', 11],
            [46, 'Public Library and archive', 11],
            [47, 'Cultural Centers', 11],

            [48, 'Mosque', 12],
            [49, 'Church', 12],
            [50, 'Temple', 12],
            [51, 'Stupa', 12],
            [52, 'Hermitage (kuti)', 12],
            [53, 'Mourning house', 12],
            [54, 'Bihar/Gumba', 12],
        ];

        foreach ($categories as $category) {
            $exists = DB::table('building_info.use_categorys')
                ->where('name', $category[1])
                ->first();
            if (!$exists) {
                UseCategory::create([
                    'id' => $category[0],
                    'name' => $category[1],
                    'functional_use_id' => $category[2]
                ]);
            }
        }
    }
}
