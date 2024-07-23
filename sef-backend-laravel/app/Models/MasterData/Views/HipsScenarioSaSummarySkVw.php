<?php

namespace App\Models\MasterData\Views;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsScenarioSaSummarySkVw extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_scenario_sa_summary_sk_vw';

}