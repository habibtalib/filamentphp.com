<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $availableLocales = config('app.available_locales', ['en']);

        // Check for locale in URL parameter
        if ($request->has('locale')) {
            $locale = $request->get('locale');
            if (in_array($locale, $availableLocales)) {
                Session::put('locale', $locale);
                App::setLocale($locale);
                return redirect($request->url());
            }
        }

        // Check for locale in session
        $sessionLocale = Session::get('locale');
        if ($sessionLocale && in_array($sessionLocale, $availableLocales)) {
            App::setLocale($sessionLocale);
        }

        return $next($request);
    }
}