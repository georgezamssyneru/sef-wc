<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppMapLink extends Model
{
    protected $table = 'app_map_link';

    protected $guarded = [];

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $primaryKey = ['map_id', 'map_layer_id'];

    protected $casts = [
        'class_id' => 'string'
    ];

    /**
     * Override the method to support composite primary keys
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery($query)
    {
        $keys = $this->getKeyName();
        if (!is_array($keys)) {
            return parent::setKeysForSaveQuery($query);
        }

        foreach ($keys as $key) {
            $query->where($key, '=', $this->getAttribute($key));
        }

        return $query;
    }

    /**
     * Override the method to get the primary key
     *
     * @return array|string
     */
    public function getKeyName()
    {
        return $this->primaryKey;
    }
}
