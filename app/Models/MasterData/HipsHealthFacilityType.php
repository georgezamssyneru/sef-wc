<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class HipsHealthFacilityType extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_facility_type';

    protected $primaryKey = 'facility_type_code';

    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function facilityType()
    {
        return $this->hasOne('App\Models\MasterData\HipsHealthFacilityTypeLink', 'facility_type_code', 'facility_type_code');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function facilityTypeCategory()
    {
        return $this->hasOne('App\Models\MasterData\HipsHealthFacilityTypeCategory', "facility_cat_code", "facility_cat_code");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function serviceAreaType()
    {
        return $this->hasOne('App\Models\MasterData\HipsServiceAreaType', "service_layer_id", "service_level");
    }

}
