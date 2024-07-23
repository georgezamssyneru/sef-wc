<?php

namespace App\Models\MasterDemographics;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsProvinces extends Model
{

    protected $connection = 'pgsqlMasterDemographics';

    protected $table = 'hips_provinces';

    protected $primaryKey = 'gid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    public $timestamps = false;


}