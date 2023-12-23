<?php

namespace App\Http\Middleware\Admin;

use App\Models\AdminIP;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeAdminIP
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $admin = AdminIP::where('ip_address', $request->getClientIp())->exists();

        if ($admin === true) {
            return $next($request);
        } else {
            return redirect(route('pages.home'));
        }
    }
}
