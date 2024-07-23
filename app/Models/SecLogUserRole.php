<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecLogUserRole extends Model{

    protected $table = 'sec_log_user_role';

    protected $primaryKey = 'sec_user_role_log_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'sec_user_role_log_id', 'user_id', 'role_id', 'role_status_id', 'modified_dt' ];

    protected $casts = [
        'sec_user_role_log_id' => 'string'
    ];

    public $timestamps = false;

}
