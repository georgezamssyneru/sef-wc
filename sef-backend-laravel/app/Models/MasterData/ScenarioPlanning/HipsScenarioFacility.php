<?php

namespace App\Models\MasterData\ScenarioPlanning;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsScenarioFacility extends Model
{

    use Uuids;

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_scenario_facility';

    protected $primaryKey = 'scenario_facility_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'scenario_facility_id' => 'string'
    ];

    /**
     * @return $this
     */
    public function getScenarioSaAllFacilityVw(){
        return $this->hasMany('App\Models\MasterData\Views\HipsScenarioSaAllVw', 'facility_id', 'facility_id')->where('is_request_facility', true);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function facilityStage(){
        return $this->hasMany('App\Models\MasterData\ScenarioPlanning\HipsScenarioFacilityStage', 'scenario_facility_id', 'scenario_facility_id');
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