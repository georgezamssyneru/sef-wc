<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class LuHighriskDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterData';

    protected $table = 'lu_highrisk';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;

}