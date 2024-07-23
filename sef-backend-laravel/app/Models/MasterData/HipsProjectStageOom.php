<?php

namespace App\Models\MasterData;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class HipsProjectStageOom extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_project_stage_oom';

    protected $primaryKey = 'project_stage_oom_id';

    protected $guarded = [];

    public $timestamps = false;

}
