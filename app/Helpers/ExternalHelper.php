<?php

namespace App\Helpers;

use App\Events\EventHistory;
use App\ExternalProviders\Esri;
use App\Models\MasterData\HipsScenarioDriveTime;
use App\Models\MasterData\HipsScenarioDrivingAnalysis;
use App\Models\MasterData\HipsServiceAreaEa;
use App\Models\MasterData\ScenarioPlanning\HipsScenarioFacility;
use App\Models\MasterData\Views\HipsScenarioEaVw;
use App\Models\SecCache;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Nette\Schema\ValidationException;

class ExternalHelper{

    /**
     * GET USERS WITH ROLES
     * @param Request $request
     * @return mixed
     */
    public static function getUsersWithRoles( Request $request ){

        return User::where(function ($query) use( $request ) {
                $query->where('email', 'ILIKE', '%' . $request->userSearch . '%')
                    ->orWhere('first_name', 'ILIKE', '%' . $request->userSearch . '%')
                    ->orWhere('last_name', 'ILIKE', '%' . $request->userSearch . '%');
            })
            ->with('secRoleUser.secRole')
            ->orderBy('user_status_id', 'ASC')
            ->get();

    }

    /**
     * GET USER WITH ROLES
     * @param Request $request
     * @return mixed
     */
    public static function getUserWithRoles( Request $request ){

        return User::where('email', $request->userSearch )
            ->with('secRoleUser.secRole')
            ->get();

    }
    
    /**
     * @param $validator
     */
    public static function failedValidation( $validator )
    {

        throw new HttpResponseException(
            response()->json([
                'success'=>false,
                'error' => $validator->errors()
            ], 422)
        );

    }

    /**
     * Summary of computeHash
     * @param mixed $password
     * @param mixed $salt
     * @param mixed $pepper
     * @param mixed $iteration
     * @return mixed
     */
    public static function computeHash($password, $salt, $pepper, $iteration = 5)
    {
        if ($iteration <= 0) {
            return $password;
        }

        $combined = $password . $salt . $pepper;
        $byteValue = mb_convert_encoding($combined, 'UTF-8');
        $byteHash = hash('sha256', $byteValue, true);
        $hash = base64_encode($byteHash);

        return self::computeHash($hash, $salt, $pepper, $iteration - 1);
    }

    public static function checkHash($password, $hash, $salt, $pepper, $iterations)
    {
        $computedHash = self::computeHash($password, $salt, $pepper, $iterations);
        return hash_equals($computedHash, $hash);
    }

    /**
     * @param $role_id
     * @return bool
     */
    public static function getAllPermissions(){

         return SecCache::select('ref3')
            ->distinct()
            ->where('user_id', auth('sanctum')->user()->sec_user_id)
            ->get()
            ->toArray();

    }

    /**
     * Summary of getTableSchema
     * @param mixed $tableName
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public static function getTableSchema($tableName, $connection)
    {
        // SQL query to get column names and data types
        $query = "
            SELECT 
                COLUMN_NAME, 
                DATA_TYPE, 
                ORDINAL_POSITION, 
                NUMERIC_PRECISION, 
                NUMERIC_SCALE, 
                CASE 
                    WHEN COLUMN_DEFAULT IS NOT NULL THEN 'DEFAULT'
                    ELSE 'NEVER'
                END AS IS_GENERATED
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = ?
        ";

        // Execute the query on the 'sqlsrv' connection
        // If we have a connection use the connection else standard connection
        if($connection){
            $columns = DB::connection($connection)->select($query, [$tableName]);
        }else{
            $columns = DB::select($query, [$tableName]);
        }
        
        return $columns;
    
    }

}