<?php

namespace App\Models\CSIR;

use Illuminate\Database\Eloquent\Model;

class LogImportDetailCSIR extends Model
{

    protected $connection = 'pgsqlCsir';

    protected $table = 'Log_ImportDetail';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function detail()
    {
        return $this->belongsTo('App\Models\CSIR\LogImportCSIR', 'ImportId');
    }

}
