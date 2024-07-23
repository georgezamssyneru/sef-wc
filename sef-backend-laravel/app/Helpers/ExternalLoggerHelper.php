<?php

namespace App\Helpers;

use App\Models\CSIR\LogImportCSIR;
use App\Models\PPO\LogImportPPO;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExternalLoggerHelper{


    /**
     * @param Request $request
     * @return mixed
     */
    public static function getLogDetail( $id, Request $request ){

        return LogImportPPO::where( 'ImportId', $id )
            ->with('logImportDetail.detail')
            ->orderBy('ImportStartDate', 'ASC')
            ->get();

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public static function getLogEntity( $id, Request $request ){

        return LogImportPPO::where( 'ImportId', $id )
            ->with('logImportEntity.detail')
            ->orderBy('ImportStartDate', 'ASC')
            ->get();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public static function getLogFacility( $id, Request $request ){

        return LogImportCSIR::where( 'ImportId', $id )
            ->with('logImportFacility.detail')
            ->orderBy('ImportStartDate', 'ASC')
            ->get();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public static function getLogDetailCSIR( $id, Request $request ){

        return LogImportCSIR::where( 'ImportId', $id )
            ->with('logImportDetail.detail')
            ->orderBy('ImportStartDate', 'ASC')
            ->get();

    }

}