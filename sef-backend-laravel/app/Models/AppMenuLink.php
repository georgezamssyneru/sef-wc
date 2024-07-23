<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppmenuLink extends Model
{

    protected $table = 'app_menu_link';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'menu_link_id', 'app_id', 'menu_type', 'style_sheet' ];

}
