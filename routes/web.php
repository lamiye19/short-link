<?php

use App\Helper\Helper;
use App\Http\Controllers\LinkController;
use App\Models\LinkClick;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/acc', function () {
    $click = LinkClick::all();
    return $click;
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware("auth")->name('')->group( function(){
    Route::controller(LinkController::class)->prefix('links')->name('links')->group( function(){
    Route::get('/',  'index')->name('');
    Route::get('/create',  'create')->name('.create');
    Route::post('/store',  'store')->name('.store');
    Route::post('/update/{uuid}',  'update')->name('.update');
    Route::get('/view/{uuid}',  'view')->name('.view');
});
});
Route::get('/{uuid}', [LinkController::class, 'get_link'])->name('short');
