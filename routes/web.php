<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\HebergementController;
use App\Http\Controllers\HistoriqueController;
use App\Http\Controllers\InformationsController;
use App\Http\Controllers\RevenuController;
use App\Http\Controllers\UserController;
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
    if (Auth::check()) {
        return view('home');
    }else{
        return view('auth.login');
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('client', ClientController::class);
Route::get('/clients/getData', [ClientController::class, 'getData']);


Route::resource('user', UserController::class);
Route::get('/users/getData', [UserController::class, 'getData']);
Route::put('setProfile', [UserController::class, 'setProfile'])->name('user.setProfile');
Route::post('/user/profileShow', [UserController::class, 'profileShow'])->name('user.profileShow');

Route::post('/client/{id}/facture', [ClientController::class, 'sendInvoiceToClient'])->name('client.facture');

Route::resource('revenu', RevenuController::class);

Route::resource('equipe', EquipeController::class);
Route::get('/equipes/getData', [EquipeController::class, 'getData']);

Route::resource('historique', HistoriqueController::class);
Route::get('/historiques/getData', [HistoriqueController::class, 'getData']);

Route::get('information', InformationsController::class)->name('information.index');


Route::resource('hebergement', HebergementController::class);

