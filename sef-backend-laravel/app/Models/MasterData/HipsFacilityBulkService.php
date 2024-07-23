<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class HipsFacilityBulkService extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_facility_bulk_service';

    protected $primaryKey = 'bulk_service_id';

    protected $guarded = [];

    public $timestamps = false;

}
