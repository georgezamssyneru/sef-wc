<?php

namespace App\Models\MasterTelegram;

use Illuminate\Database\Eloquent\Model;

class MsgAction extends Model
{

    protected $connection = 'pgsqlMasterTelegram';

    protected $table = 'msg_action';

    protected $primaryKey = 'msg_action_id';

    protected $guarded = [];

    public $timestamps = false;

}
