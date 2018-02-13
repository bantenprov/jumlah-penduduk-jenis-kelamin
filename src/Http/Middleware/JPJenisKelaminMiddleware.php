<?php namespace Bantenprov\JPJenisKelamin\Http\Middleware;

use Closure;

/**
 * The JPJenisKelaminMiddleware class.
 *
 * @package Bantenprov\JPJenisKelamin
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class JPJenisKelaminMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
