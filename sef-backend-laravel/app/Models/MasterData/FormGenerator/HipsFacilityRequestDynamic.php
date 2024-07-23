<?php

namespace App\Models\MasterData\FormGenerator;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsFacilityRequestDynamic extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_facility_request';

    protected $primaryKey = 'facility_request_id';

    protected $guarded = [];

    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function appWfInstance()
    {
        return $this->hasOne('App\Models\AppWfInstance', "wf_instance_id", "wf_instance_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', "sec_user_id", "sec_user_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function facilityType(){
        return $this->hasOne('App\Models\MasterData\HipsHealthFacilityType', 'facility_type_code', 'facility_type_code');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function clinicCategory(){
        return $this->hasOne('App\Models\MasterData\HipsHealthFacilityType', 'facility_type_code', 'clinic_category');
    }

    public function getForm(){
        return $this->hasOne('App\Models\MasterData\FormGenerator\AppForm', 'form_id', 'form_id');
    }

    public function getFacility(){
        return $this->hasOne('App\Models\MasterData\GridEditing\HipsFacilityDynamic', 'facility_id', 'facility_id');
    }

}