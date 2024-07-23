<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecLogUser extends Model{

    protected $table = 'sec_log_user';

    protected $primaryKey = 'sec_user_log_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    protected $casts = [
        'sec_user_log_id' => 'string'
    ];

    public $timestamps = false;

}
