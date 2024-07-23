<?php

namespace App\Models\MasterList;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{

    protected $connection = 'pgsqlMaster';

    protected $table = 'Facility';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

}
