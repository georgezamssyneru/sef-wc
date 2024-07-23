<?php

namespace App\Models\MasterData\ScenarioPlanning;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsScenarioDriveTimeQueue extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_scenario_drive_time_queue';

    protected $primaryKey = 'scenario_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['is_complete'];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hipsDriveTimeQueue()
    {
        return $this->hasOne('App\Models\MasterData\ScenarioPlanning\HipsDriveTimeQueue', "queue_id", "queue_id");
    }

}