<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{

    protected $table = 'event_type';

    protected $primaryKey = 'event_type_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'event_key'
    ];

    public $timestamps = true;

}
