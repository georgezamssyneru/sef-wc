<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecPermission extends Model
{

    protected $table = 'sec_permission';

    protected $primaryKey = 'permission_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'permission_id', 'permission_name', 'class_id', 'ref1', 'ref2', 'ref3' ,'ref_type', 'can_view', 'can_edit', 'can_delete', 'can_execute', 'can_custom' ];

    public $timestamps = false;

    protected $casts = [
        'permission_id' => 'string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function appClass(){
        return $this->hasOne('App\Models\AppClass', 'class_id', 'class_id');
    }

}
