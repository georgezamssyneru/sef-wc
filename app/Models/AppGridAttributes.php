<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppGridAttributes extends Model
{

    protected $table = 'app_grid_attributes';

    protected $primaryKey = 'grid_attribute_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'grid_id',
        'attribute_id',
        'display_name',
        'sort_order',
        'filteroptions',
        'width',
        'allow_sorting',
        'allow_filtering',
        'allow_grouping',
        'get_lookup',
        'is_pinned',
        'allow_edit',
    ];

    public $timestamps = false;

    protected $casts = [
        'grid_attribute_id' => 'string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classAttributes()
    {
        return $this->hasMany('App\Models\AppClassAttribute', "attribute_id", "attribute_id");
    }

}
