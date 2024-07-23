<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Template2B1Dynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterUamp';

    protected $table = 'template2_b1';

    protected $primaryKey = 'template2_b1_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'template2_b1_id' => 'string'
    ];

}