<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function switchLanguage($lang)
    {
        if (in_array($lang, ['en', 'ar'])) {
            session(['locale' => $lang]);
            app()->setLocale($lang); // Application directe de la locale
            
            // Log pour le débogage
            \Log::info('Language switched', [
                'requested_lang' => $lang,
                'session_locale' => session('locale'),
                'app_locale' => app()->getLocale()
            ]);
        }
        
        return redirect()->back();
    }
    public function index()
{
    $enPath = base_path('lang/en/messages.php');
    $arPath = base_path('lang/ar/messages.php');
    
    $debug = [
        'en_file_exists' => file_exists($enPath),
        'ar_file_exists' => file_exists($arPath),
        'en_content' => file_exists($enPath) ? array_keys(include $enPath) : [],
        'ar_content' => file_exists($arPath) ? array_keys(include $arPath) : [],
        'current_locale' => app()->getLocale(),
        'session_locale' => session('locale', 'not set')
    ];
    
    dd($debug); // Cela arrêtera l'exécution et affichera les infos de débogage
    
    return view('welcome');
}


}
