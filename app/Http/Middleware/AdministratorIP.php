<?php

namespace App\Http\Middleware;

use App\Models\AdminIP;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdministratorIP
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!AdminIP::where('ip', '=', $request->ip())->first()) {
            return redirect('/');
        }

        return $next($request);
    }
}
