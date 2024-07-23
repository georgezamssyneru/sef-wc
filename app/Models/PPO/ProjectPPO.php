<?php

namespace App\Models\PPO;

use Illuminate\Database\Eloquent\Model;

class ProjectPPO extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'pmis_project';

    protected $primaryKey = 'project_key';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];


}
