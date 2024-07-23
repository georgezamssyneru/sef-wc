<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class LuOwnershipDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterApp';

    protected $table = 'lu_ownership';

    protected $primaryKey = 'ownership_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'ownership_id' => 'string'
    ];

}