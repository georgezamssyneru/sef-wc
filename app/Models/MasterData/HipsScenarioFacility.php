<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class HipsScenarioFacility extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_scenario_facility';

    protected $primaryKey = 'scenario_facility_id';

    protected $protected = [];

    public $timestamps = false;

    protected $casts = [
        'scenario_facility_id' => 'string'
    ];

    public function scenarioFacilityStage()
    {
        return $this->hasOne('App\Models\MasterData\HipsScenarioFacilityStage', 'scenario_facility_id', 'scenario_facility_id')->where('scenario_stage_id', 3 );
    }

}
