<?php

namespace App\Models\MasterData\GridEditing;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class LuUom extends Model
{

    //use Uuids;

    protected $connection = 'pgsqlMasterData';

    protected $table = 'lu_uom';

    protected $primaryKey = 'uom_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
//    protected $fillable = [
//        'latitude',
//        'longitude',
//        'municipality_district_id',
//        'primary_facility_name',
//        'facility_name',
//        'facility_type_id',
//        'facility_type_code',
//        'sec_user_id',
//        'facility_status_id',
//        'level_1_bed',
//        'level_2_bed',
//        'level_3_bed',
//        'gazetted_bed',
//        'design_bed',
//        'usable_bed',
//        'user_dept',
//        'u_acq_date',
//        'u_acq_cost_ht',
//        'u_pa_asset_cost',
//        'u_maint_strat',
//        'u_pa_ht_cost',
//        'blg_area',
//        'consulting_rooms',
//        'u_reno_cost',
//        'condition_id',
//        'u_crc',
//        'is_pmis_matched_to_mfl',
//        'secondary_facility_name',
//        'shape',
//    ];

    //protected $guarded = ['uom_id'];

    public $timestamps = false;

}