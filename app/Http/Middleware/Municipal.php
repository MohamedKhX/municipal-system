<?php

namespace App\Http\Middleware;

use App\Models\Municipality;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Municipal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $mun = Municipality::find(getCurrentMunicipality());

        if($mun->is_active == 0){
            abort(404);
        }

        return $next($request);
    }
}
