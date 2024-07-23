<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class LuIndexSuitabilityDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterData';

    protected $table = 'lu_index_suitability';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;

}