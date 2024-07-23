<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Template6EDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterUamp';

    protected $table = 'template6_e';

    protected $primaryKey = 'template6_e_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'template6_e_id' => 'string'
    ];

}