<?php

namespace App\Models\MasterDemographics;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsDistrictMunicipalities extends Model
{

    protected $connection = 'pgsqlMasterDemographics';

    protected $table = 'hips_district_municipalities';

    protected $primaryKey = 'gid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    public $timestamps = false;


}