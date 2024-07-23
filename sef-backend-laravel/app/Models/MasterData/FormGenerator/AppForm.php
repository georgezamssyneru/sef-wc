<?php

namespace App\Models\MasterData\FormGenerator;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class AppForm extends Model
{

    use Uuids;

    protected $connection = 'pgsqlMasterApp';

    protected $table = 'app_form';

    protected $primaryKey = 'form_id';

    protected $guarded = [];

    public $timestamps = true;

    protected $casts = [
        'form_id' => 'string'
    ];

    /**
     * @return $this
     */
    public function formAttr()
    {
        return $this->hasMany('App\Models\MasterData\FormGenerator\AppFormAttributes', "form_id", "form_id")
            ->orderBy('sort_order', 'ASC');
    }

}