<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class HipsFacilityTl extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_facility_tl';

    protected $primaryKey = 'facility_tl_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'facility_tl_id' => 'string'
    ];

}
