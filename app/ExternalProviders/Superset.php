<?php

namespace App\ExternalProviders;

use App\Helpers\RequestHelper;
use Illuminate\Support\Facades\Cache;

class Superset
{

    public function __construct()
    {

    }

    public function test()
    {
        return true;
    }

    /**
     * @param $url
     * @param $options
     * @param $body
     * @return bool|mixed
     */
    public function getCharts( $url, $options ){

        try {

            $getCharts = RequestHelper::requestGet( $url, $options );

            return $getCharts->json();

        } catch (Exception $e) {

            return false;

        }

    }

    /**
     * @param $url
     * @param $options
     * @param $body
     * @return bool|mixed
     */
    public function getAccessGuestToken( $url, $options, $body ){

        try {

            $accessToken = RequestHelper::requestPostApplicationJson( $url, $options, $body );

            return $accessToken->json();

        } catch (Exception $e) {

            return false;

        }

    }

}