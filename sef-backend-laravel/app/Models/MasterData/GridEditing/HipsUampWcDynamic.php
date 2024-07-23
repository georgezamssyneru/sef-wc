<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsUampWcDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_uamp_wc';

    protected $primaryKey = 'uuid';

    protected $guarded = [];

    public $timestamps = false;

}