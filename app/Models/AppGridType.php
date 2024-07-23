<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppGridType extends Model
{

    protected $table = 'app_grid_type';

    protected $primaryKey = 'grid_type_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    public $timestamps = false;

}
