<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class HipsHealthFacilityTypeCategory extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_facility_cat';

    protected $primaryKey = 'facility_type_cat_id';

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
    public function facilityType()
    {
        return $this->belongsTo('App\Models\MasterDataDraft\HipsHealthFacilityType', 'facility_cat_code');
    }

}
