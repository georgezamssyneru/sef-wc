<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportLayout extends Model
{

    protected $table = 'report_layout';

    protected $primaryKey = 'ReportId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    //protected $fillable = [];

    public $timestamps = false;

}
