<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class HipsGlobalRange extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_global_range';

    protected $primaryKey = 'global_range_id';

    protected $protected = [];

    public $timestamps = false;

    /**
     * @return $this
     */
    public function rangeValue()
    {
        return $this->hasMany('App\Models\MasterData\HipsGlobalRangeValue', 'global_range_id', 'global_range_id')->orderBy('from_value', 'asc');
    }


}