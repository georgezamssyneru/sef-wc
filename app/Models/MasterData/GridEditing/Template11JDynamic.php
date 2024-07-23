<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Template11JDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterUamp';

    protected $table = 'template11_j';

    protected $primaryKey = 'template11_j_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'template11_j_id' => 'string'
    ];

}