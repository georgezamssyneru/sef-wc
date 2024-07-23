<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Template1A2Dynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterUamp';

    protected $table = 'template1_a2';

    protected $primaryKey = 'template1_a2_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'template1_a2_id' => 'string'
    ];

}