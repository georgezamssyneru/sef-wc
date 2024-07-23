<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class LuLocationType extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'lu_location_type';

    protected $primaryKey = 'location_type_id';

    protected $guarded = [];

    public $timestamps = false;

}
