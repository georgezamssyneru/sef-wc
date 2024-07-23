<?php

namespace App\Models\MasterData\FormGenerator;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class AppFormAttributes extends Model
{

    use Uuids;

    protected $table = 'app_form_attributes';

    protected $primaryKey = 'form_attr_id';

    protected $guarded = [];

    public $timestamps = true;

    protected $casts = [
        'form_attr_id' => 'string',
        'form_id'      => 'string'
    ];

    public $incrementing = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appClassAttr()
    {
        return $this->hasMany('App\Models\AppClassAttribute', "attribute_id", "attribute_id");
    }

}