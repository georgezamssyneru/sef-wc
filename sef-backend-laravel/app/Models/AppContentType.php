<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class AppContentType extends Model
{

    //use Uuids;

    protected $table = 'app_content_type';

    protected $primaryKey = 'content_type_id';

    protected $guarded = [];

    public $timestamps = false;

}