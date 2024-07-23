<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class AppTreeNode extends Model
{

    use Uuids;

    protected $table = 'app_tree_node';

    protected $primaryKey = 'tree_node_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'tree_node_id' => 'string',
        'tree_id'      => 'string'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appTreeNodeContent()
    {
        return $this->hasMany('App\Models\AppTreeNodeContent', 'tree_node_id', 'tree_node_id')->orderBy('sort_order', 'ASC');
    }

}