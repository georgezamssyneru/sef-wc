<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppDataSource extends Model
{

    protected $table = 'app_data_source';

    protected $primaryKey = 'data_source_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    protected $casts = [
        'data_source_id' => 'string'
    ];

    public $timestamps = false;

    //public $incrementing = false;

    protected $keyType = 'string';

}
