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
    protected $guarded = [];

    public $timestamps = false;

    public $incrementing = false;

    protected $casts = [
        'class_type' => 'integer',
        'class_id'  => 'string'
    ];

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

}