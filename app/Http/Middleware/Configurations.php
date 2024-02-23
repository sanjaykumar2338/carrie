<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Configuration;
use Illuminate\Support\Facades\DB;

class Configurations
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            DB::connection()->getPdo();
            if(DB::connection()->getDatabaseName()){
                if(\Schema::hasTable('configurations')) 
                {
                    $configuration = new Configuration();
                    $configuration->init();
                    $prefix = request()->route()->getPrefix();
                    $prefix = \Str::contains($prefix, 'admin');

                    if(!$prefix && config('Site.coming_soon') == 1)
                    {
                        return response()->view('errors.coming_soon');
                    }
                    else if(!$prefix && config('Site.status') == 0)
                    {
                        return response()->view('errors.503');
                    }
                }
            }
        } catch (\Exception $e) {
        }
        
        return $next($request);
    }
}
