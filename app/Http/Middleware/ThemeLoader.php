<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Hexadog\ThemesManager\Http\Middleware\ThemeLoader as HexadogThemeLoader;

class ThemeLoader extends HexadogThemeLoader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $theme = 'frontend/lemars'): Response
    {
        $theme = config('Theme.select_theme', $theme);
        if ($request->segment(1) === 'admin') {
            $theme = config('Theme.select_admin_theme', 'admin/zenix');
        }

        // Call parent Middleware handle method
        return parent::handle($request, $next, $theme);
    }
}
