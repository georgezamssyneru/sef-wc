<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class AppGridDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterApp';

    protected $table = 'app_grid';

    protected $primaryKey = 'grid_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'grid_id' => 'string'
    ];

}