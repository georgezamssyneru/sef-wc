<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class HipsServiceAreaFacility extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_service_area_facility';

    protected $primaryKey = 'service_area_facility_id';

    protected $fillable = [
        'service_area_id',
        'facility_id',
        'shape'
    ];

    public $timestamps = false;

}
