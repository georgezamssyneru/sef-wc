<?php

namespace App\Http\Middleware;

use App\Events\EventHistory;
use Closure;
use Illuminate\Http\Request;

class RequestResponseInformer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $user = $request->user();

        // ----------------  RESPONSE
        $response = $next($request);

        if(isset($response->exception)){

            if( $user  ){

                event( new EventHistory( array(
                    'email'     => $user->email,
                    'url '      => $request->fullUrl(),
                    'error'     => $response->exception->getMessage()
                ),'SYSTEM_ERROR') );

            }else{

                event( new EventHistory( array(
                    'url '      => $request->fullUrl(),
                    'error'     => $response->exception->getMessage()
                ),'SYSTEM_ERROR') );

            }

        }

        return $response;

    }
}
