<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogDbBackup extends Model
{

    protected $table = 'log_db_backup';

    protected $primaryKey = 'backup_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'backup_state',
        'message',
        'backup_state',
        'filepath',
        'filename',
        'remotepath'
    ];

    public $timestamps = false;

}
