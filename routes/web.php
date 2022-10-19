<?php

use App\Http\Controllers\Controller;
use App\Http\Livewire\Marketplace\CheckInComponent;
use App\Http\Livewire\Marketplace\MarketplaceComponent;
use App\Http\Livewire\Partner\Product\ProductComponent;
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
Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('index');

Route::get('/marketplace', MarketplaceComponent::class)->name('marketplace.index');
Route::get('/marketplace/search/{category}', MarketplaceComponent::class)->name('marketplace.search');
//Route::get('/marketplace', [App\Http\Controllers\Marketplace\MarketplaceController::class, 'index'])->name('marketplace.index');

Route::get('teste/{carts_id}', CheckInComponent::class)->name('teste');
Route::get('/dashboard', [App\Http\Controllers\Controller::class, 'index'])->middleware(['auth'])->name('dashboard');

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

Route::get('/typeahead_autocomplete/action', [App\Http\Controllers\Controller::class, 'action'])->name('typeahead_autocomplete.action');

//Route::get('testelivewire', ProductComponent::class);




