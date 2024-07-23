<?php

namespace App\Models\MasterTelegram;

use Illuminate\Database\Eloquent\Model;

class Telegram extends Model
{

    protected $connection = 'pgsqlMasterTelegram';

    protected $table = 'msg_raw';

    protected $primaryKey = 'msg_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'msg_received_dt',
        'msg_payload',
    ];

    public $timestamps = false;

}
