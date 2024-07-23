<?php

namespace App\ExternalProviders;

use App\Helpers\RequestHelper;
use Illuminate\Support\Facades\Cache;

class WorkflowApi
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
    public function getGeomWkt( $url, $options, $body ){

        try {

            $serviceAreas = RequestHelper::requestPostApplicationJson( $url, $options, $body );

            return $serviceAreas->json();

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
    public function startWorkflow( $url, $options, $body ){

        try {

            $serviceAreas = RequestHelper::requestPostApplicationJson( $url, $options, $body );

            return $serviceAreas->json();

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
    public function workflowProgress( $url, $options, $body ){

        try {

            $workflowProgress = RequestHelper::requestPostApplicationJson( $url, $options, $body );

            return $workflowProgress->json();

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
    public function workflowApproval( $url, $options, $body ){

        try {

            $workflowApproval= RequestHelper::requestPostApplicationJson( $url, $options, $body );

            return $workflowApproval->json();

        } catch (Exception $e) {

            return false;

        }

    }

}