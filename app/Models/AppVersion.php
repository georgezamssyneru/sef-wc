<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppVersion extends Model
{

    protected $table = 'app_version';

    protected $primaryKey = 'app_version_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'version_no',
        'version_name',
        'release_date',
        'description',
        'notes'
    ];

    public $timestamps = false;

}
