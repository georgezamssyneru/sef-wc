<?php

namespace App\Models\MasterData\FormGenerator;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsScenarioWf extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_scenario_wf';

    protected $primaryKey = 'scenario_wf_id';

    protected $guarded = [];

    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', "sec_user_id", "approver_user_id");
    }

}