<?php

namespace App\Models\MasterTelegram;

use Illuminate\Database\Eloquent\Model;

class MsgPhoto extends Model
{

    protected $connection = 'pgsqlMasterTelegram';

    protected $table = 'msg_photo';

    protected $primaryKey = 'msg_photo_id';

    protected $guarded = [];

    public $timestamps = false;

}
