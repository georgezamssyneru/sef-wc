<?php

namespace App\Models;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class AppComponent extends Model
{

    protected $table = 'app_component';

    protected $primaryKey = 'app_component_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'app_component_id', 'component_name', 'route', 'display_name', 'icon', 'json_params' ];

    public $timestamps = false;

    protected $casts = [
        'app_component_id' => 'string'
    ];

}
