<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Request;
use Session;
use App;
use Config;


class Language
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

        $raw_locale = session()->get('locale');
//        if($currentLocale) app()->setLocale($currentLocale);
        if(in_array($raw_locale, Config::get('app.locales'))) {
            $locale = $raw_locale;
        } else $locale = Config::get('app.locale');

        App::setLocale($locale);
        return $next($request);
    }
}
