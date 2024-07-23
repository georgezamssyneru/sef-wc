<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Template5D2Dynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterUamp';

    protected $table = 'template5_d2';

    protected $primaryKey = 'template5_d2_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'template5_d2_id' => 'string'
    ];

}