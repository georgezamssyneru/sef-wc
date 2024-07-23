<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppDashboard extends Model
{

    protected $table = 'app_dashboard';

    protected $primaryKey = 'dashboard_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    protected $casts = [
        'dashboard_id' => 'string'
    ];

    public $timestamps = false;

    //public $incrementing = false;

    protected $keyType = 'string';

    public function appTreeNodeContent()
    {
        return $this->hasOne('App\Models\AppTreeNodeContent', "content_id", "dashboard_id");
    }

}
