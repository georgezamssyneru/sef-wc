<?php

namespace App\Models\MasterTelegram;

use Illuminate\Database\Eloquent\Model;

class MsgData extends Model
{

    protected $connection = 'pgsqlMasterTelegram';

    protected $table = 'msg_data';

    protected $primaryKey = 'msg_data_id';

    protected $guarded = [];

    public $timestamps = false;

}
