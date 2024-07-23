<?php

namespace App\Models;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class AppWfData extends Model
{

    protected $table = 'app_wf_data';

    protected $primaryKey = 'wf_data_id';

    public $timestamps = true;

    protected $guarded = [];

    protected $casts = [
        'wf_data_id' => 'string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function appClass()
    {
        return $this->hasOne('App\Models\AppClass', "class_id", "class_id");
    }

}
