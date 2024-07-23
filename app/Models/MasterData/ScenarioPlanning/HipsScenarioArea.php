<?php

namespace App\Models\MasterData\ScenarioPlanning;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsScenarioArea extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_scenario_area';

    protected $primaryKey = 'area_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'area_id',
        'scenario_id',
        'shape'
    ];

    public $timestamps = false;

    protected $casts = [
        'area_id' => 'string'
    ];

}