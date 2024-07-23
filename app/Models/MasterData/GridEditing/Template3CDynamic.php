<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Template3CDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterUamp';

    protected $table = 'template3_c';

    protected $primaryKey = 'template3_c_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'template3_c_id' => 'string'
    ];

}