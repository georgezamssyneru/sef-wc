<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class MflFacility extends Model
{

    use Uuids;

    protected $connection = 'pgsqlMasterData';

    protected $table = 'mfl_facility';

    protected $primaryKey = 'facility_guid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    public $timestamps = false;

}
