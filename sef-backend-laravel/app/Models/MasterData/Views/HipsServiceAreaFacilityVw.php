<?php

namespace App\Models\MasterData\Views;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsServiceAreaFacilityVw extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_service_area_facility_vw';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getFacility()
    {
        return $this->hasOne('App\Models\MasterData\HipsHealthFacility', "facility_id", "facility_id");
    }

}