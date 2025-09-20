<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class ConvertStringBooleans
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next): RedirectResponse|Response
    {
        $input = $request->all();

        foreach ($input as $key => $value) {
            if ($value === 'true') {
                $input[$key] = true;
            } elseif ($value === 'false') {
                $input[$key] = false;
            }
        }

        $request->replace($input);

        return $next($request);
    }
}
