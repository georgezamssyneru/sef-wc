<?php

namespace App\Models;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class AppComponentInstance extends Model
{

    protected $table = 'app_component_instance';

    protected $primaryKey = 'app_component_instance_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'app_component_instance_id', 'component_id', 'content_name', 'json_params' ];

    public $timestamps = false;

    protected $casts = [
        'app_component_instance_id' => 'string'
    ];

}
