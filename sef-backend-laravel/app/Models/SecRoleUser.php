<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecRoleUser extends Model{

    protected $table = 'sec_role_user';

    protected $primaryKey = 'role_user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'role_user_id', 'user_id', 'role_id' ];

    protected $casts = [
        'role_user_id' => 'string'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function secRole()
    {
        return $this->hasMany('App\Models\SecRole', 'role_id', 'role_id');
    }

}
