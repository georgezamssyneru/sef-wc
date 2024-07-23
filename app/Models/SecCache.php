<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecCache extends Model
{

    protected $table = 'sec_cache';

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'user_id', 'permission_id', 'permission_name', 'class_id', 'ref1', 'ref2', 'ref3' ,'ref_type', 'can_view', 'can_edit', 'can_delete', 'can_execute', 'can_custom', 'role_id' ];

    public $timestamps = false;

    protected $casts = [
        'user_id' => 'string'
    ];

}
