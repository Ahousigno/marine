<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('client.accueil');
});
// Route::resource('/', 'Controller');

Route::get('/accueil', function () {
    return view('client.accueil');
})->middleware(['auth'])->name('client.accueil');

require __DIR__ . '/auth.php';


Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::get('/accueil', [ClientController::class, 'indexe'])->name('client.accueil');
});

//partie utilisateurs
Route::get('/list', [UsersController::class, 'index'])->name('admin.users.index');
Route::get('/create', [UsersController::class, 'create'])->name('admin.users.create');
Route::post('create/store', [UsersController::class, 'store'])->name('admin.users.store');
Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
Route::post('/update', [UsersController::class, 'update'])->name('admin.users.update');
Route::get('/show/{user}', [UsersController::class, 'show'])->name('admin.users.show');
Route::delete('/destroy/{user}', [UsersController::class, 'destroy'])->name('admin.users.destroy');
Route::get('/stagiaire', [UsersController::class, 'stagiaire'])->name('admin.users.stagiaire');


// partie demande de permission
Route::get('/permission', [ClientController::class, 'demande_permission'])->name('client.demande_permission');
Route::get('/edit/{id}', [ClientController::class, 'edit_demande'])->name('client.edit_demande');
Route::get('/statut', [ClientController::class, 'statut'])->name('client.statut_demande');
Route::post('/update', [ClientController::class, 'demande_update'])->name('client.demande_update');
Route::post('permission/stone', [ClientController::class, 'stone'])->name('demande.stone');
Route::get('demande/detail', [AdminController::class, 'demande_detail'])->name('admin.infos_demande');
Route::get('admin/index', [AdminController::class, 'index_admin'])->name('admin.index_admin');
Route::get('demande/rejete', [AdminController::class, 'demande_rejete'])->name('admin.demande_rejete');
Route::post('demande/rejete', [AdminController::class, 'refuse'])->name('admin.demande_rejet');
Route::get('demande/accepte', [AdminController::class, 'demande_accepte'])->name('admin.demande_accepte');
Route::post('demande/accepte', [AdminController::class, 'valider'])->name('admin.demande_accept');

//rapport
Route::post('depot/rapport', [ClientController::class, 'depot_rapport'])->name('rapport');
