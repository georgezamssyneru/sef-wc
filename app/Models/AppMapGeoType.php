<?php

namespace App\Models;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class AppMapGeoType extends Model
{
    protected $table = 'app_map_geo_type';

    protected $primaryKey = 'geo_type_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    public $timestamps = false;
    
}
