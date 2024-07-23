<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class LuConditionDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterData';

    protected $table = 'lu_condition';

    protected $primaryKey = 'condition_id';

    protected $guarded = [];

    public $timestamps = false;

}