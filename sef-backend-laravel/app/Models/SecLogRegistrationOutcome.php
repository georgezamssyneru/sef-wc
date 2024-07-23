<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecLogRegistrationOutcome extends Model{

    protected $table = 'sec_log_registration_outcome';

    protected $primaryKey = 'sec_registration_outcome_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'outcome' ];

    public $timestamps = false;

}
