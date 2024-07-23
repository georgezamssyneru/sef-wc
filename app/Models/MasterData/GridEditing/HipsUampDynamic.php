<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsUampDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_uamp';

    protected $primaryKey = 'uamp_id';

    protected $guarded = [];

    public $timestamps = false;

}