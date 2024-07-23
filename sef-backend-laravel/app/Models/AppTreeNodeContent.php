<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class AppTreeNodeContent extends Model
{

    //use Uuids;

    protected $table = 'app_tree_node_content';

    protected $primaryKey = 'tree_node_content_id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'tree_node_content_id' => 'string',
        'content_id' => 'string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contentTypeId()
    {
        return $this->hasOne('App\Models\AppContentType', 'content_type_id', 'content_type_id');
    }

    public function appGrid()
    {
        return $this->hasOne('App\Models\AppGrid', 'grid_id', 'content_id')->orderBy('grid_name', 'DESC');
    }

    public function appDashboard()
    {

        return $this->hasOne('App\Models\AppDashboard', 'dashboard_id', 'content_id');

    }

}