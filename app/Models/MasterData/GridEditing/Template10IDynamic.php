<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Template10IDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterUamp';

    protected $table = 'template10_i';

    protected $primaryKey = 'template10_i_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'template10_i_id' => 'string'
    ];

}