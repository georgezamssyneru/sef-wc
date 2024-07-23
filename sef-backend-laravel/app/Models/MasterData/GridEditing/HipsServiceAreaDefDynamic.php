<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsServiceAreaDefDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_service_area_def';

    protected $primaryKey = 'service_area_def_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'service_area_def_id' => 'string'
    ];

}
