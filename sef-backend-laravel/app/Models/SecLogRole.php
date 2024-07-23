<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecLogRole extends Model{

    protected $table = 'sec_log_role';

    protected $primaryKey = 'sec_user_log_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'sec_user_log_id', 'role_id', 'role_status_id', 'modified_dt' ];

    protected $casts = [
        'sec_user_log_id' => 'string'
    ];

    public $timestamps = false;

}
