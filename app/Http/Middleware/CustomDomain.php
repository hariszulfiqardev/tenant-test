<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class CustomDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $domain = $request->getHost();

        $tenant = Tenant::where('domain', $domain)->firstOrFail();

        if (!$tenant) {
            abort(404);
        }

        // Append domain and tenant to the Request object
        // for easy retrieval in the application.
        $request->merge([
            'domain' => $domain,
            'tenant' => $tenant
        ]);

        View::share('tenantName', $tenant->domain);

        return $next($request);
    }
}
