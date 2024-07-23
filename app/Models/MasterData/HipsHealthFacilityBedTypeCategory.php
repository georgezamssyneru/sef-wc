<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class HipsHealthFacilityBedTypeCategory extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_facility_bed_type_cat';

    protected $primaryKey = 'bed_type_cat_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    public $timestamps = false;

}
