<?php

namespace App\Models\MasterData\ScenarioPlanning;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsScenario extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_scenario';

    protected $primaryKey = 'scenario_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'scenario_id',
        'scenario_name',
        'scenario_description',
        'area_id',
        'owner_sec_user_id',
        'date_created',
        'last_state'
    ];

    public $timestamps = false;

    protected $casts = [
        'scenario_id' => 'string'
    ];

}