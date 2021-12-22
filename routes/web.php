<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Date;
use App\Http\Livewire\Counter;
use App\Http\Controllers\ProjectController;
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



Route::view('/contacts', 'users.contacts');


Route::middleware(['auth', 'check.gmail'])->group(function () {
    // Precisa estar autenticado e o e-mail ser gmail para conseguir acessar 🙂
 
    Route::get('/', 'NomeController@metodo');
 
    Route::get('outra-rota', 'NameController@methodTwo');
});
 
Route::group(['middleware' => ['auth', 'check.gmail']], function() {
    // Precisa estar autenticado e o e-mail ser gmail para conseguir acessar 🙂
 
    Route::get('/', 'NomeController@metodo');
 
    Route::get('outra-rota', 'NameController@methodTwo');
});



Route::get('/date', [Date::class, 'render']);
Route::get('/counter', [Counter::class, 'render']);


Route::prefix('projects')->group(function () {
    Route::get('apiwithoutkey', [ProjectController::class, 'apiWithoutKey'])->name('apiWithoutKey');
    Route::get('apiwithkey', [ProjectController::class, 'apiWithKey'])->name('apiWithKey');
});



Route::resource('projects', ProjectController::class);