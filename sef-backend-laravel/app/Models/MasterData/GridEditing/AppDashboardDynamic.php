<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class AppDashboardDynamic extends Model
{

    //use Uuids;

    // protected $connection = 'pgsqlMasterData';

    protected $table = 'app_dashboard';

    protected $primaryKey = 'dash_id';

    protected $guarded = [];

    public $timestamps = false;

}
