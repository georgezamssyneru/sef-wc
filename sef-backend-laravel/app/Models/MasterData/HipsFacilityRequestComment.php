<?php

namespace App\Models\MasterData;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class HipsFacilityRequestComment extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_facility_request_comment';

    protected $primaryKey = 'facility_request_comment_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    public $timestamps = false;

//    protected $casts = [
//        'hips_comment_id' => 'string'
//    ];


}
