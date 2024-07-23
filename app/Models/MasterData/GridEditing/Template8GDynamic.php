<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Template8GDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterUamp';

    protected $table = 'template8_g';

    protected $primaryKey = 'template8_g_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'template8_g_id' => 'string'
    ];

}