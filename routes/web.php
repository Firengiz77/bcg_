<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Models\Languages;

Route::get('login/{lang?}', function () {

    $lang = 'en';
    return view('auth.login', compact('lang'));


})->name('login');
require __DIR__ . '/auth.php';

Route::get('change-language/{lang}/{route?}/{slug?}', [LanguageController::class, 'changeLanquage'])->name('language');


foreach(Languages::all() as $lang){
   // Route::get('/', [FrontendController::class, 'index'])->name('index')->middleware(['XSS']);
  
}