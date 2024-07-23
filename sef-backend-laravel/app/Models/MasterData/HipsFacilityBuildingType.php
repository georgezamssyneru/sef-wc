<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class HipsFacilityBuildingType extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_facility_building_type';

    protected $primaryKey = 'building_type_id';

    protected $guarded = [];

    public $timestamps = false;

}
