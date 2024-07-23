<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class HipsFacilityTlServiceArea extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_facility_tl_service_area_copy';

    protected $primaryKey = 'facility_tl_sa_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'facility_tl_sa_id' => 'string'
    ];

}