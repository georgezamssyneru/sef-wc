<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsGlobalRangeDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_global_range';

    protected $primaryKey = 'global_range_id';

    protected $guarded = [];

    public $timestamps = false;

}