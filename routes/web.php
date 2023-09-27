<?php

use App\Http\Controllers\ShortLinkController;
use App\Models\ShortLink;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function(){

    Route::get('/dashboard',[ShortLinkController::class,'dashboard'])->name('dashboard');
    Route::post('generate/short-url',[ShortLinkController::class,'generateShortUrl'])->name('generate.short-url');
    Route::get('redirect/{url}',[ShortLinkController::class,'redirect']);
});

require __DIR__.'/auth.php';
