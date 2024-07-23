<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class HipsServiceArea extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_service_area';

    protected $primaryKey = 'service_area_facility_id';

    protected $fillable = [
        'break_value',
        'service_area_def_id',
        'service_area_job_id',
        'facility_id',
        'shape',
        'shape_length',
        'shape_area'
    ];

    public $timestamps = false;

}
