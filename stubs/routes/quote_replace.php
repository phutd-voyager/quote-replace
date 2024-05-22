<?php

use Illuminate\Support\Facades\Route;

Route::get('/quote-replace/test', [\App\Http\Controllers\QuoteReplaceController::class, 'index'])->name('quoteReplace.index');
Route::post('/quote-replace/submit', [\App\Http\Controllers\QuoteReplaceController::class, 'submit'])->name('quoteReplace.submit');