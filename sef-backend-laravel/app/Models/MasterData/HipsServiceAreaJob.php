<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class HipsServiceAreaJob extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_service_area_job';

    protected $primaryKey = 'service_area_job_id';

    protected $fillable = [
        'service_area_def_id',
        'status', 'job_msg',
        'job_msg',
        'start_dt',
        'last_polled_dt',
        'end_dt',
        'payload',
        'job_token',
        'break_value'
    ];

    public $timestamps = false;

    public function serviceAreaDef()
    {
        return $this->hasOne('App\Models\MasterData\HipsServiceAreaDef', "service_area_def_id", "service_area_def_id");
    }

}
