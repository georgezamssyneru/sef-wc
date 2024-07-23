<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class LuUomDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterApp';

    protected $table = 'lu_uom';

    protected $primaryKey = 'uom_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'uom_id' => 'string'
    ];

}