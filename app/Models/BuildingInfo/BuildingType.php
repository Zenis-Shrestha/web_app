<?php

namespace App\Models\BuildingInfo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingType extends Model
{
    use HasFactory;

    protected $table = 'building_info.building_type';
    protected $primaryKey = 'id';
}
