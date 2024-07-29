<?php

namespace App\Models;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class AppMapLayer extends Model
{
    protected $table = 'app_map_layer';
    protected $primaryKey = 'map_layer_id';

    protected $fillable = [
        'layer_name',
        'class_id',
        'label_attribute_id',
        'map_style_id'
    ];

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'class_id' => 'string'
    ];

}
