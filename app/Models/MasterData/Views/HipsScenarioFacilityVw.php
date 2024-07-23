<?php

namespace App\Models\MasterData\Views;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsScenarioFacilityVw extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_scenario_facility_vw';

    public function facilityType(){
        return $this->hasOne('App\Models\MasterData\HipsHealthFacilityType', 'facility_type_code', 'facility_type_code');
    }

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
    public function getFacility(){
        return $this->hasOne('App\Models\MasterData\GridEditing\HipsFacilityDynamic', 'facility_id', 'facility_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getScenario(){
        return $this->hasOne('App\Models\MasterData\HipsScenario', 'scenario_id', 'scenario_id');
    }

}