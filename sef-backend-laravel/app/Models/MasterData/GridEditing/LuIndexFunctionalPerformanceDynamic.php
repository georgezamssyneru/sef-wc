<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class LuIndexFunctionalPerformanceDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterData';

    protected $table = 'lu_index_functional_performance';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;

}