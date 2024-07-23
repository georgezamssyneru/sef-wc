<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class AppTree extends Model
{

    use Uuids;

    protected $table = 'app_tree';

    protected $primaryKey = 'tree_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'tree_id' => 'string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appTreeNode()
    {
        return $this->hasMany('App\Models\AppTreeNode', 'tree_id', 'tree_id')->orderBy('sort_order', 'ASC');
    }

}