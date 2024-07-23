<?php

namespace App\Models\MasterData\Views;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsScenarioEaAllVw extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_scenario_ea_all_vw';

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = ['shape_mp'];

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
    public function scenarioFacilityStage()
    {
        return $this->hasOne('App\Models\MasterData\HipsScenarioFacilityStage', 'scenario_facility_stage_id', 'scenario_facility_stage_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getFacility(){
        return $this->hasOne('App\Models\MasterData\GridEditing\HipsFacilityDynamic', 'facility_id', 'facility_id');
    }


}