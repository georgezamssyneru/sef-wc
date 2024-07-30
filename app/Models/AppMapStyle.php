<?php

namespace App\Models;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class AppMapStyle extends Model
{
    protected $table = 'app_map_style';
    protected $primaryKey = 'map_style_id';

    protected $fillable = [
        'map_style_name',
        'style_config',
    ];

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'class_id' => 'string'
    ];

}
