<?php

namespace App\Models\MasterData\Views;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsScenarioEaVw extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_scenario_ea_vw';

    protected $casts = [
        'ea_code' => 'integer'
    ];

}