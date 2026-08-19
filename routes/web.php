<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LandingPageController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])
    ->name('home');

/*
|--------------------------------------------------------------------------
| Dashboard Redirect
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');

});

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});
/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/landing-page', [LandingPageController::class, 'edit'])
            ->name('landing.edit');

        Route::put('/landing-page', [LandingPageController::class, 'update'])
            ->name('landing.update');

        /*
        |--------------------------------------------------------------------------
        | Galeri
        |--------------------------------------------------------------------------
        */

        Route::get('/galeri', [GaleriController::class, 'index'])
            ->name('galeri.index');

        Route::post('/galeri', [GaleriController::class, 'store'])
            ->name('galeri.store');

        Route::delete('/galeri/{galeri}', [GaleriController::class, 'destroy'])
            ->name('galeri.destroy');

    });

require __DIR__.'/auth.php';