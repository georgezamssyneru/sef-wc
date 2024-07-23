<?php

namespace App\Models;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class AppClass extends Model
{

    protected $table = 'app_class';

    protected $primaryKey = 'class_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'class_id',
        'class_type',
        'class_schema',
        'class_name',
        'display_name',
        'pk_field_name' ];

    public $timestamps = false;

    protected $casts = [
        'class_id' => 'string'
    ];

}
