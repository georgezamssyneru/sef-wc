<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecRole extends Model
{

    protected $table = 'sec_role';

    protected $primaryKey = 'role_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'role_name',
        'role',
        'role_group_id',
        'role_type_id',
        'role_status',
        'role_is_profile'
    ];

    public $timestamps = false;

    protected $casts = [
        'role_id' => 'string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function secRoleUser()
    {
        return $this->hasMany('App\Models\SecRoleUser', 'role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function secRoleType(){
        return $this->hasOne('App\Models\SecRoleType', 'role_type_id', 'role_type_id');
    }

}
