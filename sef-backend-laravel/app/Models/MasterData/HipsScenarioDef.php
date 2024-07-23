<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class HipsScenarioDef extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_scenario_def';

    protected $primaryKey = 'scenario_def_id';

    protected $guarded = [];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function serviceAreaDefinition()
    {
        return $this->hasOne('App\Models\MasterData\HipsServiceAreaDef', 'service_area_def_id', 'service_area_def_id');
    }



}
