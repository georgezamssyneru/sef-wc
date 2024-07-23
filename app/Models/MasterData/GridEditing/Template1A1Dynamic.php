<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Template1A1Dynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterUamp';

    protected $table = 'template1_a1';

    protected $primaryKey = 'template1_a1_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'template1_a1_id' => 'string'
    ];

}