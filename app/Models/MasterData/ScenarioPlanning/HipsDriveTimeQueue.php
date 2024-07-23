<?php

namespace App\Models\MasterData\ScenarioPlanning;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsDriveTimeQueue extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_drive_time_queue';

    protected $primaryKey = 'queue_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hipsDriveTimeQueueStatus()
    {
        return $this->hasOne('App\Models\MasterData\ScenarioPlanning\HipsDriveTimeQueueStatus', "queue_process_status_id", "queue_process_status_id");
    }

}