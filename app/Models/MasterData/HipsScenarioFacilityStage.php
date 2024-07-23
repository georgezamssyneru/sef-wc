<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class HipsScenarioFacilityStage extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_scenario_facility_stage';

    protected $primaryKey = 'scenario_facility_stage_id';

    protected $foreignKey = 'scenario_facility_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'scenario_facility_stage_id' => 'string',
        'scenario_facility_id'  => 'string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function scenarioFacility()
    {
        return $this->hasOne('App\Models\MasterData\HipsScenarioFacility', 'scenario_facility_id', 'scenario_facility_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function facilityType(){
        return $this->hasOne('App\Models\MasterData\HipsHealthFacilityType', 'facility_type_code', 'facility_type_code');
    }

}
