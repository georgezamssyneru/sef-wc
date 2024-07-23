<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppMenuItem extends Model
{

    protected $table = 'app_menu_item';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'id', 'menu_id', 'display_name', 'link', 'action', 'attribute' ];

    protected $casts = [
        'id' => 'string'
    ];

}
