<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class HipsScenario extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_scenario';

    protected $primaryKey = 'scenario_id';

    protected $protected = [];

    public $timestamps = false;

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
     * @return $this
     */
    public function scenarioFacility()
    {
        return $this->hasOne('App\Models\MasterData\HipsScenarioFacility', 'scenario_id', 'scenario_id')->where('is_request_facility', true);
    }



}
