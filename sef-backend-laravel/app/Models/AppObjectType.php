<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppObjectType extends Model
{

    protected $table = 'app_menu_item';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'type_description' ];

}
