<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Template4D1Dynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterUamp';

    protected $table = 'template4_d1';

    protected $primaryKey = 'template4_d1_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'template4_d1_id' => 'string'
    ];

}