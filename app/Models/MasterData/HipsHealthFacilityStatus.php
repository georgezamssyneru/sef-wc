<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsHealthFacilityStatus extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_facility_status';

    protected $primaryKey = 'facility_status_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    public $timestamps = false;

}