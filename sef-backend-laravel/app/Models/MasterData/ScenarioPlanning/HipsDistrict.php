<?php

namespace App\Models\MasterData\ScenarioPlanning;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsDistrict extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_district';

    protected $primaryKey = 'district_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'district_id',
        'district_name'
    ];

    public $timestamps = false;

}