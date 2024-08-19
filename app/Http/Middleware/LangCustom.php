<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;

class LangCustom
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public $lang;

    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('lang')) {
            # code...
        } else {
            $request->session()->forget('lang');
            $request->session()->put('lang', 'id');
        }

        // Visitor
        if (!$request->session()->has('visitor')) {
            $digitId = app('App\Http\Controllers\RandomController')->Digit(5);
            $locationData = Location::get($request->ip());

            $visitor = array(
                "visitor_id" => csrf_token(),
                "visitor_ip" => $request->ip(),
                "visitor_user_agent" => $request->userAgent(),
                "visitor_latitude" => !empty($locationData->latitude) ? $locationData->latitude : null,
                "visitor_longitude" => !empty($locationData->longitude) ? $locationData->longitude : null,
                "visitor_country" => !empty($locationData->countryName) ? $locationData->countryName : null,
                "visitor_city" => !empty($locationData->cityName) ? $locationData->cityName : null,
                "visitor_act" => URL::current(),
                "visitor_date_created" => date('Y-m-d H:i:s'),
                "visitor_date_updated" => date('Y-m-d H:i:s')
            );
            DB::table('stmik_visitor')->insert($visitor);
            $request->session()->put('visitor', csrf_token());
        }

        return $next($request);
    }
}
