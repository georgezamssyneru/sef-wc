<?php

namespace App\Models\CSIR;

use Illuminate\Database\Eloquent\Model;

class LogImportFacilityCSIR extends Model
{

    protected $connection = 'pgsqlCsir';

    protected $table = 'Log_ImportFacility';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    public function detail()
    {
        return $this->belongsTo('App\Models\CSIR\LogImportCSIR', 'ImportId');
    }

}
