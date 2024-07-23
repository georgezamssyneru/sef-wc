<?php

namespace App\Models\MasterTelegram;

use Illuminate\Database\Eloquent\Model;

class MsgInstance extends Model
{

    protected $connection = 'pgsqlMasterTelegram';

    protected $table = 'msg_instance';

    protected $primaryKey = 'msg_instance_id';

    protected $guarded = [];

    public $timestamps = false;

}
