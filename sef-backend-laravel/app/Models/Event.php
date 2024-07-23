<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $table = 'event';

    protected $primaryKey = 'event_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'event_id',
        'event_type_id',
        'sec_user_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'event_id' => 'string'
    ];

    public $timestamps = true;

}
