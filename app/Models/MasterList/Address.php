<?php

namespace App\Models\MasterList;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $connection = 'pgsqlMaster';

    protected $table = 'Address';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

}
