<?php

use App\Http\Controllers\ProfileController;
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
})->name('welcome');
Route::get('/reservation', function () {
    return view('pages.reservation');
})->name('reservation');
Route::get('/FAQ', function () {
    return view('pages.faq');
})->name('faq');

Route::get('/comment', function () {
    return view('pages.comment');
})->name('comment');


Route::get('/dashboard', function () {
    if (auth()->user()->is_admin == true) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('user.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

//admin routes
Route::prefix('administrator')->group(
    function () {
        Route::get('/dashboard', function () {
            return view('admin.index');
        })->name('admin.dashboard');
        Route::get('/rooms', function () {
            return view('admin.rooms');
        })->name('admin.rooms');
        Route::get('/users', function () {
            return view('admin.users');
        })->name('admin.users');
        Route::get('/reservation', function () {
            return view('admin.reservation');
        })->name('admin.reservation');
        Route::get('/report', function () {
            return view('admin.report');
        })->name('admin.report');
        Route::get('/faq', function () {
            return view('admin.faq');
        })->name('admin.faq');
        Route::get('/comment', function () {
            return view('admin.comment');
        })->name('admin.comment');
    }
);

//user routes
Route::prefix('user')->group(
    function () {
        Route::get('/dashboard', function () {
            return view('user.index');
        })->name('user.dashboard');
        Route::get('/rooms', function () {
            return view('user.room');
        })->name('user.room');
        Route::get('/reservation', function () {
            return view('user.reservation');
        })->name('user.reservation');

    }
);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
