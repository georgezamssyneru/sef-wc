<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecUserStatus extends Model{

    protected $table = 'sec_user_status';

    protected $primaryKey = 'sec_user_status_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'user_status' ];

    public $timestamps = false;

}
