<?php

namespace App\Models\MasterData;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class HipsFacilityComment extends Model
{

    protected $connection = 'pgsqlMasterData';

    protected $table = 'hips_facility_comment';

    protected $primaryKey = 'hips_comment_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['hips_comment_id', 'user_id', 'comment_dt', 'facility_guid', 'comment'];

    public $timestamps = false;

    protected $casts = [
        'hips_comment_id' => 'string'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'sec_user_id', 'user_id');
    }

}
