<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Request;
use Session;
use App;
use Config;


class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
//    public function __construct(Application $app, Request $request) {
//        $this->app = $app;
//        $this->request = $request;
// }

    public function handle($request, Closure $next)
    {
        $locale = collect(request()->segments())->last();
//        dd($locale);
        if (in_array($locale, Config::get('app.locales')) && $locale != 'ua') {
            App::setLocale('en');

//            dd($locale);
            $locale = null;
        } else if (in_array($locale, Config::get('app.locales')) && $locale === 'ua'){
            App::setLocale('ua');
//            dd($locale);
            $locale = null;

        }
//            App::setLocale('ua');

        return $next($request);
    }
}
