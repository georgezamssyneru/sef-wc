<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class HipsDriveTimeQueue extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_drive_time_queue';

    protected $primaryKey = 'queue_id';

    protected $guarded = [];

    public $timestamps = false;

}
