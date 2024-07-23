<?php

namespace App\Models;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class AppWf extends Model
{

    protected $table = 'app_wf';

    protected $primaryKey = 'wf_id';

    public $timestamps = true;

    protected $guarded = [];

    protected $casts = [
        'wf_id' => 'string'
    ];

}
