<?php

namespace App\Helpers;

use App\Models\MasterTelegram\MsgAction;
use App\Models\MasterTelegram\MsgData;
use App\Models\MasterTelegram\MsgFile;
use App\Models\MasterTelegram\MsgInstance;
use App\Models\MasterTelegram\MsgMember;
use App\Models\MasterTelegram\MsgPhoto;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GeometryRingsToWkt{

    public $data;

    public $allExteriorRings = [];

    public $allInteriorRings = [];

    public function __construct( $data )
    {

        $this->data = $data;

        //  ---------   GET EXTERNAL RINGS
        $this->getExternalRings();



    }

    public function getExternalRings(){

        foreach ($this->data as $value) {

        }

    }

    public function getInternalRings(){


    }

}