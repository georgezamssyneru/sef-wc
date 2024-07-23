<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class HipsServiceAreaEa extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_service_area_ea';

    protected $primaryKey = 'ea_code';

    protected $guarded = [];

    public $timestamps = false;

}
