<?php

use App\Models\User;
use Inertia\Inertia;
use App\Notifications\NoActivity;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ScrumController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', function () {
//     return Inertia::render('Dashboard', [
//         'user' => auth()->user(),
//     ]);
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [DashboardController::class, 'getDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/mail', function () {
    $user = User::first();
    $user->notify(new NoActivity("A new user has visited on your application."));
    return Inertia::render('Dashboard');
    });

Route::middleware(['auth', 'activity.check'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/scrumboard', [PageController::class, 'scrumboard'])->name('scrumboard');
    Route::get('/clients', [ClientController::class, 'getAllClients'])->name('getClients');
    Route::post('/clients/sorted', [ClientController::class, 'sortClients'])->name('sorted');
    Route::post('/clients/addclient', [ClientController::class, 'addClientOrBusiness'])->middleware('update.activity')->name('addClient');
    Route::any('/clients/sortBy{sortBy}-{sortType}', [ClientController::class, 'sortClients'])->name('sortClient');
    Route::post('/clients/delete', [ClientController::class, 'deleteClientOrBusiness'])->middleware('update.activity')->name('delContact');
    Route::post('/scrumboard/add', [ScrumController::class, 'createScrumboard'])->name('addScrumboard');
    Route::middleware(['check.assigned'])->group(function () {
        Route::get('/scrumboard/{scrumId}', [CardController::class, 'getCards'])->name('getCards');
        Route::post('/scrumboard/{scrumId}/adduser', [CardController::class, 'AddUserToCard'])->name('addUser');
        Route::middleware(['update.activity'])->group(function () {
            Route::post('scrumboard/{scrumId}/addcard', [CardController::class, 'addCardToBoard'])->name('addCard');
            Route::post('/scrumboard/{scrumId}/change', [CardController::class, 'changeCategory'])->name('changeCat');
            Route::post('/scrumboard/{scrumId}/delcard', [CardController::class, 'deleteCard'])->name('delCard');
            Route::post('/scrumboard/{scrumId}/delete', [ScrumController::class, 'delScrumboard'])->name('delScrumboard');
        });
    });
});
 
require __DIR__.'/auth.php';
