<?php

namespace App\Models\PPO;

use Illuminate\Database\Eloquent\Model;

class LogImportPPO extends Model
{

    protected $connection = 'pgsqlPpo';

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
    public function logImportDetail()
    {
        return $this->hasMany('App\Models\PPO\LogImportDetailPPO', "ImportID", "ImportId");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logImportEntity()
    {
        return $this->hasMany('App\Models\PPO\LogImportEntityPPO', "ImportID", "ImportId");
    }

}
