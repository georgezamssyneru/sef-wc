<?php

namespace App\Models\CSIR;

use Illuminate\Database\Eloquent\Model;

class LogImportCSIR extends Model
{

    protected $connection = 'pgsqlCsir';

    protected $table = 'Log_Import';

    protected $primaryKey = 'ImportId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logImportFacility()
    {
        return $this->hasMany('App\Models\CSIR\LogImportFacilityCSIR', "ImportId", "ImportId");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logImportDetail()
    {
        return $this->hasMany('App\Models\CSIR\LogImportDetailCSIR', "ImportId", "ImportId");
    }

}
