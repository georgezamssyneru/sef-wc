<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Model;

class HipsHealthFacilityBed extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_facility_bed';

    protected $primaryKey = 'facility_bed_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'facility_bed_id',
        'facility_id',
        'bed_type_id',
        'bed_count',
        'sec_user_id',
        'last_changed_date'
    ];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facility()
    {
        return $this->belongsTo('App\Models\MasterDataDraft\HipsHealthFacility', 'facility_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bedType()
    {
        return $this->hasOne('App\Models\MasterData\HipsHealthFacilityBedType', "bed_type_id", "bed_type_id")
            ->orderBy('bed_type', 'desc');
    }

}
