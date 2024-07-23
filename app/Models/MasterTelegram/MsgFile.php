<?php

namespace App\Models\MasterTelegram;

use Illuminate\Database\Eloquent\Model;

class MsgFile extends Model
{

    protected $connection = 'pgsqlMasterTelegram';

    protected $table = 'msg_file';

    protected $primaryKey = 'msg_file_id';

    protected $guarded = [];

    public $timestamps = false;

}
