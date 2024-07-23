<?php

namespace App\Models\PPO;

use Illuminate\Database\Eloquent\Model;

class LogImportEntityPPO extends Model
{

    protected $connection = 'pgsqlPpo';

    protected $table = 'Log_ImportEntity';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    public function detail()
    {
        return $this->belongsTo('App\Models\PPO\LogImportPPO', 'ImportId');
    }

}
