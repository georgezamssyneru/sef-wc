<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Template9HDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterUamp';

    protected $table = 'template9_h';

    protected $primaryKey = 'template9_h_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'template9_h_id' => 'string'
    ];

}