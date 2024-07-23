<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsDistrictMunicapalities extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_district_municipalities';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    public $timestamps = false;


}