<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App; // Ajoutez cette ligne
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // Log the current locale from session
        \Log::info('Locale before setting: ' . App::getLocale());

        if (session()->has('locale')) {
            App::setLocale(session('locale'));
        } else {
            App::setLocale('en'); // Default locale if none is set
        }

        // Log the locale after setting
        \Log::info('Locale after setting: ' . App::getLocale());

        return $next($request);
    }
}