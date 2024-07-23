<?php

namespace App\Models;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class AppComponentInstanceLink extends Model
{

    protected $table = 'app_component_instance_link';

    protected $primaryKey = 'app_component_link_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['app_component_instance_id', 'app_id' ];

    public $timestamps = false;

    protected $casts = [
        'app_component_link_id' => 'string'
    ];

}
