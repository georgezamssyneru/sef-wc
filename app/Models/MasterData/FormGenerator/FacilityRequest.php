<?php

namespace App\Models\MasterData\FormGenerator;

use Illuminate\Database\Eloquent\Model;

class FacilityRequest extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_facility_request';

    protected $primaryKey = 'hips_facility_request_id';

    protected $guarded = ['hips_facility_request_id'];

    public $timestamps = true;

}