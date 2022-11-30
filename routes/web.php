<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TransactController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return Inertia::render('Auth/Login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'Index'])->name('dashboard');

    Route::get('/transacts', [TransactController::class, 'Index'])->name('transacts.index');
    Route::post('/transacts/store', [TransactController::class, 'store'])->name('transacts.store');

    Route::get('/schedules', [ScheduleController::class, 'Index'])->name('schedules.index');
    Route::post('/schedules/store', [ScheduleController::class, 'store'])->name('schedules.store');

    // Route::get('/customers', [CustomerController::class, 'Index'])->name('customers.index');
    // Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
    Route::resource('/customers', CustomerController::class);

    Route::get('/users', [UserController::class, 'Index'])->name('users.index');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

    Route::get('/reports', [ReportController::class, 'Index'])->name('reports.index');
});
