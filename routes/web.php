<?php
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocaleController;

Route::middleware([\App\Http\Middleware\SetLocale::class])->group(function () {
    Route::resource('contact', ContactController::class);
    
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('locale/{lang}', [LocaleController::class, 'switchLanguage'])->name('locale');

    Route::get('/test-translations', function () {
        $output = [
            'current_locale' => app()->getLocale(),
            'test_translation_en' => trans('messages.welcome'),
            'test_direct_en' => trans('messages.welcome', [], 'en'),
            'test_direct_ar' => trans('messages.welcome', [], 'ar'),
        ];
        
        return response()->json($output);
    });
    
    Route::get('/', function () {
        return view('welcome');
    });
});