<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{

    protected $table = 'app';

    protected $primaryKey = 'app_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'app_id', 'app_name', 'type' ];

    public $timestamps = false;

    protected $casts = [
        'app_id' => 'string'
    ];

}
