<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class HipsServiceAreaType extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_service_area_type';

    protected $primaryKey = 'service_area_type_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    public $timestamps = false;

    public function definition()
    {
        return $this->belongsTo('App\Models\MasterData\HipsServiceAreaDef', 'service_area_type_id', 'service_area_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function serviceAreaDefinition()
    {
        return $this->hasOne('App\Models\MasterData\HipsServiceAreaDef', "service_area_type_id", "service_area_type_id");
    }

}
