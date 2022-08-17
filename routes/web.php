<?php

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
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
Route::get('/', 'Controller@index')->name('index');

Route::get('/marketplace', 'Marketplace\MarketplaceController@index')->name('marketplace.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/loja', function () {
    return view('loja.loja');
})->middleware(['auth'])->name('loja');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/partner.php';
require __DIR__.'/user.php';
require __DIR__.'/store.php';
require __DIR__.'/product.php';
require __DIR__.'/marketplace.php';
require __DIR__.'/cart.php';

/* teste search */

Route::get('search-autocomplete', function(){
    return view('teste');
})->name('teste.serch');

Route::get('/typeahead_autocomplete/action', 'Controller@action')->name('typeahead_autocomplete.action');


