<?php

namespace App\Models;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class AppReport extends Model
{

    protected $table = 'app_report';

    protected $primaryKey = 'report_id';

    public $timestamps = true;

    protected $guarded = [];

    protected $casts = [
        'report_id' => 'string'
    ];

}
