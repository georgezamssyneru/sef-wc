<?php

namespace App\Models\MasterData\Views;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsScenarioSummaryDataVw extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_scenario_summary_data_vw';


}