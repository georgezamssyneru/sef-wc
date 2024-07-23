<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class HipsScenarioDriveTime extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_scenario_drive_time';

    protected $primaryKey = 'scenario_da_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'scenario_da_id' => 'string'
    ];

}
