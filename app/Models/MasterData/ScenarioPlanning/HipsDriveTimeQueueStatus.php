<?php

namespace App\Models\MasterData\ScenarioPlanning;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsDriveTimeQueueStatus extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_drive_time_queue_status';

    protected $primaryKey = 'queue_process_status_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    public $timestamps = false;

}