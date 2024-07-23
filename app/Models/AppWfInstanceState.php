<?php

namespace App\Models;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class AppWfInstanceState extends Model
{

    protected $table = 'app_wf_instance_state';

    protected $primaryKey = 'wf_state_id';

    public $timestamps = true;

    protected $guarded = [];

    protected $casts = [
        'wf_state_id' => 'string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function appWfData()
    {
        return $this->hasOne('App\Models\AppWfData', "wf_data_id", "wf_data_id");
    }

}
