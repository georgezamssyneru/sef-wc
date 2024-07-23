<?php

namespace App\Models\PPO;

use Illuminate\Database\Eloquent\Model;

class LogImportDetailPPO extends Model
{

    protected $connection = 'pgsqlPpo';

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
        return $this->belongsTo('App\Models\PPO\LogImportPPO', 'ImportId');
    }

}
