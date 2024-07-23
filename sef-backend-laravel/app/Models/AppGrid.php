<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppGrid extends Model
{

    protected $table = 'app_grid';

    protected $primaryKey = 'grid_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'grid_id',
        'class_id',
        'grid_name',
        'for_admin',
        'filter_query',
        'grid_type_id',
        'allow_insert',
        'allow_delete',
        'slug',
    ];

    public $timestamps = false;

    protected $casts = [
        'grid_id' => 'string'
    ];

}
