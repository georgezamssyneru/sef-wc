<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class HipsGlobalRangeValue extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_global_range_value';

    protected $primaryKey = 'global_range_value_id';

    protected $protected = [];

    public $timestamps = false;


}