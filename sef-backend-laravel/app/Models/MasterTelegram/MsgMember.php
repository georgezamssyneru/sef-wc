<?php

namespace App\Models\MasterTelegram;

use Illuminate\Database\Eloquent\Model;

class MsgMember extends Model
{

    protected $connection = 'pgsqlMasterTelegram';

    protected $table = 'msg_member';

    protected $primaryKey = 'msg_member_id';

    protected $guarded = [];

    public $timestamps = false;

}
