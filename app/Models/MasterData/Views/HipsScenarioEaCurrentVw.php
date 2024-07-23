<?php

namespace App\Models\MasterData\Views;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsScenarioEaCurrentVw extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_scenario_ea_current_vw';

    public function scenario()
    {
        return $this->hasOne('App\Models\MasterData\HipsScenario', 'scenario_id', 'scenario_id');
    }

    public function owner()
    {
        return $this->hasOne('App\Models\User', 'sec_user_id', 'owner_sec_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function facilityRequest()
    {
        return $this->hasOne('App\Models\MasterData\FormGenerator\HipsFacilityRequestDynamic', 'facility_request_id', 'facility_request_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function scenarioFacility()
    {
        return $this->hasOne('App\Models\MasterData\HipsScenarioFacility', 'scenario_facility_id', 'scenario_facility_id');
    }

}