<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class HipsHealthFacilityTypeLink extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_facility_type_link';

    protected $primaryKey = 'facility_type_link_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['facility_id', 'facility_type_code', 'type_order'];

    public $timestamps = false;

    public function facilityType()
    {
        return $this->hasOne('App\Models\MasterData\HipsHealthFacilityType', "facility_type_code", "facility_type_code");
    }

}
