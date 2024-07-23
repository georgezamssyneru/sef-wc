<?php

namespace App\Models;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class AppClassAttribute extends Model
{

    protected $table = 'app_class_attribute';

    protected $primaryKey = 'attribute_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'attribute_id',
        'class_id',
        'field_name',
        'class_name',
        'display_name',
        'data_type',
        'udt_name',
        'field_order',
        'numeric_precision',
        'numeric_scale',
        'datetime_precision',
        'is_generated',
        'lk_table',
        'lk_join',
        'lk_display',
        'lk_schema',
        'lk_table_use',
        'lk_table_use_value',
        'lk_table_use_display',
        'filter_query_class'
    ];

    public $timestamps = false;

    protected $casts = [
        'attribute_id' => 'string'
    ];

}
