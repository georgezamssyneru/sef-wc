<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class RequestHelper{

    /**
     * @param $options
     * @param $body
     * @return \Illuminate\Http\Client\Response
     */
    public static function requestPost( $url, $options, $body ){

        $postRequest = Http::asForm()
            ->withOptions( $options )
            ->post( $url, $body );

        return $postRequest;

    }


    /**
     * @param $url
     * @param $options
     * @param $body
     * @return \Illuminate\Http\Client\Response
     */
    public static function requestPostApplicationJson( $url, $options, $body ){

        if($options){
            $postRequest = Http::withHeaders($options)->post( $url, $body );
        }else{
            $postRequest = Http::post( $url, $body );
        }

        return $postRequest;

    }

    /**
     * @param $url
     * @param $options
     * @return \Illuminate\Http\Client\Response
     */
    public static function requestGet( $url, $options ){

        if($options){
            $getRequest = Http::withHeaders($options)->get( $url );
        }else{
            $getRequest = Http::get( $url, $options);
        }

        return $getRequest;

    }

}