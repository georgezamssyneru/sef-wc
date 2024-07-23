<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class HipsFacilitySupplyDistance extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_facility_supply_distance';

    protected $primaryKey = 'supply_distance_id';

    protected $guarded = [];

    public $timestamps = false;

}
