<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecUserApproval extends Model{

    protected $table = 'sec_user_approval';

    protected $primaryKey = 'sec_user_approval_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'sec_user_approval_id', 'review_user_id', 'outcome_dt', 'outcome_id', 'comment' ];

    public $timestamps = false;

}
