<?php

namespace App\Models;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class AppWfInstance extends Model
{

    protected $connection = 'pgsql';

    protected $table = 'app_wf_instance';

    protected $primaryKey = 'wf_instance_id';

    public $timestamps = true;

    protected $guarded = [];

    protected $casts = [
        'wf_instance_id' => 'string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appWfInstanceState()
    {
        return $this->hasOne('App\Models\AppWfInstanceState', "wf_state_id", "wf_state_id");
    }

    public function status()
    {
        return $this->hasOne('App\Models\AppWfStatus', "status_id", "status_id");
    }

}
