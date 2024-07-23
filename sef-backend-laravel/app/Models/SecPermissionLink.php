<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecPermissionLink extends Model
{

    protected $table = 'sec_permission_link';

    protected $primaryKey = 'p_link_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'p_link_id', 'role_id', 'permission_id' ];

    public $timestamps = false;

    protected $casts = [
        'p_link_id' => 'string'
    ];
}
