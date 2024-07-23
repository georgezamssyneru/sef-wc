<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class HipsServiceAreaDef extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_service_area_def';

    protected $primaryKey = 'service_area_def_id';

    public $timestamps = false;

    public function getTableColumns()
    {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function serviceAreaType()
    {
        return $this->hasOne('App\Models\MasterData\HipsServiceAreaType', "service_area_type_id", "service_area_type_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function globalRangeValue()
    {
        return $this->hasMany('App\Models\MasterData\HipsGlobalRangeValue', 'global_range_id', 'global_range_id')
            ->orderBy('from_value', 'ASC');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function globalRange()
    {
        return $this->hasMany('App\Models\MasterData\HipsGlobalRange', 'global_range_id', 'global_range_id');
    }

}
