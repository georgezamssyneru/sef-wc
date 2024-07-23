<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Template7FDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterUamp';

    protected $table = 'template7_f';

    protected $primaryKey = 'template7_f_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'template7_f_id' => 'string'
    ];

}