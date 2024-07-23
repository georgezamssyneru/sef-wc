<?php

namespace App\Models\MasterData\ScenarioPlanning;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsScenarioFacilityStage extends Model
{

    use Uuids;

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_scenario_facility_stage';

    protected $primaryKey = 'scenario_facility_stage_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $protected = [];

    public $timestamps = false;

    protected $casts = [
        'scenario_facility_stage_id' => 'string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function facilityType(){
        return $this->hasOne('App\Models\MasterData\HipsHealthFacilityType', 'facility_type_code', 'facility_type_code');
    }

}