<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsGlobalRangeValueDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_global_range_value';

    protected $primaryKey = 'global_range_value_id';

    protected $guarded = [];

    public $timestamps = false;

}