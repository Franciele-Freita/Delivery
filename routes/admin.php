<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/* Admin Auth */

Route::group(['prefix' => '/admin', 'namespace' => 'Admin\Auth'], function() {
    Route::middleware(['auth:admin'])->group(function () {

        /* Log Out */

        Route::get('/logout', 'AuthAdminController@destroy')->name('admin.destroy');

    });

    /* Login */

    Route::get('/login', 'AuthAdminController@index')->name('admin.login.index');
    Route::post('/login', 'AuthAdminController@store')->name('admin.login.store');

    /* Register */

    Route::get('/register', 'AuthAdminController@index')->name('admin.register.index');
    Route::post('/register', 'AuthAdminController@store')->name('admin.register.store');
});

/* end auth */

/* Routes Admin */

Route::group(['prefix' => '/admin', 'namespace' => 'Admin'], function() {
    Route::middleware(['auth:admin'])->group(function () {

        Route::get('/', 'AdminController@index')->name('admin.index');

        Route::get('/categoria', 'CategoryController@index')->name('admin.category.index');
        Route::get('/categoria/register', 'CategoryController@erroindex')->name('admin.category.erroindex');
        Route::post('/categoria', 'CategoryController@store')->name('admin.category.store');
        Route::post('/categoria/update', 'CategoryController@update')->name('admin.category.update');
        Route::post('/categoria/destroy', 'CategoryController@destroy')->name('admin.category.destroy');
        Route::get('/usuarios/index', 'UsuarionAdminController@index')->name('admin.usuarios.index');

    });

});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/users', 'Controller@userIndex')->name('admin.userIndex');

});
/* end routes Admin */

Route::get('/partners', 'Controller@partnerIndex')->name('admin.partnerIndex');
