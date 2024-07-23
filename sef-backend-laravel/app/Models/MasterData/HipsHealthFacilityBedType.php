<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class HipsHealthFacilityBedType extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_facility_bed_type';

    protected $primaryKey = 'bed_type_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bed()
    {
        return $this->belongsTo('App\Models\MasterData\HipsHealthFacilityBed', 'bed_type_id');

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bedTypeCat()
    {
        return $this->hasOne('App\Models\MasterData\HipsHealthFacilityBedTypeCategory', "bed_type_cat_id", "bed_type_cat_id");
    }

}
