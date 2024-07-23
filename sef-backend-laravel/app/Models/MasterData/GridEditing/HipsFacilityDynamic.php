<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsFacilityDynamic extends Model
{

    use Uuids;

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_facility';

    protected $primaryKey = 'facility_id';

    protected $guarded = [];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function facilityBed()
    {
        return $this->hasMany('App\Models\MasterData\HipsHealthFacilityBed', "facility_id", "facility_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facilityType()
    {
        return $this->hasOne('App\Models\MasterData\HipsHealthFacilityType', 'facility_type_code', 'facility_type_code');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function facilityLink()
    {
        return $this->hasMany('App\Models\MasterData\HipsHealthFacilityTypeLink', "facility_id", "mfl_facility_guid")
            ->orderBy('type_order', 'asc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mflFacility()
    {
        return $this->hasOne('App\Models\MasterData\MflFacility', "facility_guid", "mfl_facility_guid");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function districtMunicipalities()
    {
        return $this->hasOne('App\Models\MasterData\HipsDistrictMunicapalities', "id", "municipality_district_id")
            ->select('province', 'district', 'district_n');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function demographicsDistrictMunicipalities()
    {
        return $this->hasOne('App\Models\MasterDemographics\HipsDistrictMunicipalities', "gid", "municipality_district_id")
            ->select('gid','district_1');
    }

    public function demographicsLocalMunicipalities()
    {
        return $this->hasOne('App\Models\MasterDemographics\HipsLocalMunicipalities', "gid", "municipality_local_id");
    }

    public function demographicsProvince()
    {
        return $this->hasOne('App\Models\MasterDemographics\HipsProvinces', "gid", "province_id");
    }

}