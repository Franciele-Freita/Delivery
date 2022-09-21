<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Livewire\Admin\FaqsComponent;
use App\Http\Livewire\Admin\PaymentFormsComponent;
use App\Http\Livewire\User\Profile\FaqComponent;
use Illuminate\Support\Facades\Route;

/* Admin Auth */

Route::group(['prefix' => '/admin', 'namespace' => 'Admin\Auth'], function() {
    Route::middleware(['auth:admin'])->group(function () {

        /* Log Out */

        Route::get('/logout', [App\Http\Controllers\Admin\Auth\AuthAdminController::class, 'destroy'])->name('admin.destroy');

    });

    /* Login */

    Route::get('/login', [App\Http\Controllers\Admin\Auth\AuthAdminController::class, 'index'])->name('admin.login.index');
    Route::post('/login', [App\Http\Controllers\Admin\Auth\AuthAdminController::class, 'store'])->name('admin.login.store');

    /* Register */

    Route::get('/register', [App\Http\Controllers\Admin\Auth\AuthAdminController::class, 'index'])->name('admin.register.index');
    Route::post('/register', [App\Http\Controllers\Admin\Auth\AuthAdminController::class, 'store'])->name('admin.register.store');
});

/* end auth */

/* Routes Admin */

Route::group(['prefix' => '/admin', 'namespace' => 'Admin'], function() {
    Route::middleware(['auth:admin'])->group(function () {

        Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');

        Route::get('/categoria', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category.index');

        Route::get('/categoria/register', [App\Http\Controllers\Admin\CategoryController::class, 'erroindex'])->name('admin.category.erroindex');
        Route::post('/categoria', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.store');
        Route::post('/categoria/update', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');
        Route::post('/categoria/destroy', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.category.destroy');
        Route::get('/usuarios/index', [App\Http\Controllers\Admin\UsuarionAdminController::class, 'index'])->name('admin.usuarios.index');

    });

});
Route::get('/admin/faq', FaqsComponent::class)->name('admin.faq.index')->middleware(['auth:admin']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/users', [App\Http\Controllers\Controller::class, 'userIndex'])->name('admin.userIndex');

});
/* end routes Admin */

Route::get('/partners', [App\Http\Controllers\Controller::class, 'partnerIndex'])->name('admin.partnerIndex');

/*  */
