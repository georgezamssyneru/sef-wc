<?php

namespace App\Models;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class AppWfStatus extends Model
{

    protected $table = 'app_wf_status';

    protected $primaryKey = 'status_id';

    public $timestamps = false;

    protected $guarded = [];

}
