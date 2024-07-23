<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecRoleLink extends Model
{

    protected $table = 'sec_role_link';

    protected $primaryKey = 'role_link_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'role_link_id', 'parent_role', 'child_role' ];

    public $timestamps = false;

    protected $casts = [
        'role_link_id' => 'string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function secRoleParent()
    {
        return $this->hasOne('App\Models\SecRole', "role_id", "parent_role");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function secRoleChild()
    {
        return $this->hasOne('App\Models\SecRole', "role_id", "child_role");
    }

}
