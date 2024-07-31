<?php

namespace App\Models\dbo;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class DimRoad extends Model
{
    use Uuids;

    protected $connection = 'oracleSpatial'; // Change this to your SQL Server connection name
    protected $table = 'dbo.DIM_Road'; // Include the schema name
    protected $primaryKey = 'Id';
    public $incrementing = false; // If Id is a UUID, it's not auto-incrementing
    protected $keyType = 'string'; // Specify that the primary key is a string (UUID)
    protected $guarded = [];
    public $timestamps = true;

    protected $casts = [
        'Id' => 'string'
    ];

}