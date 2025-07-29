<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenanceMode
{
    public function handle(Request $request, Closure $next): Response
    {
        $appCek =  env('APP_MAINTENANCE');
        if ($appCek == true) {
            # code...
            abort(503);
        }

        return $next($request);
    }
}
