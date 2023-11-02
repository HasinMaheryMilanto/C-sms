<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcceuilControlller;
use App\Http\Controllers\ConnexionControlle;
use App\Http\Controllers\InscriptionController;

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
    return view('login');
})->name('login');
Route::post('/inscription', [InscriptionController::class, 's_inscrir'])->name('inscription');
Route::post('/connexion', [ConnexionControlle::class, 'se_connecter'])->name('connexion');

Route::group(['middleware' => 'auth.user'], function () {
    Route::get('/home', [AcceuilControlller::class, 'index'])->name('home');
    Route::get('/deconnexion', [AcceuilControlller::class, 'deconnexion'])->name('deconnexion');
    Route::get('/getConverstion', [AcceuilControlller::class, 'getConversation'])->name('getConverstion');
    Route::get('/check_enligne', [AcceuilControlller::class, 'chek_enligne'])->name('check_enligne');
    Route::post('/chearch_conversation', [AcceuilControlller::class, 'chearch_conversation'])->name('chearch_conversation');
    Route::post('/chatwith', [AcceuilControlller::class, 'chatwith'])->name('chatwith');
    Route::post('/send_message', [AcceuilControlller::class, 'send_message'])->name('send_message');
    Route::post('/get_all_message', [AcceuilControlller::class, 'get_all_message'])->name('get_all_message');
    Route::post('/fetchData', [AcceuilControlller::class, 'fetchData'])->name('fetchData');
    Route::post('/noulelle_conversation', [AcceuilControlller::class, 'noulelle_conversation'])->name('noulelle_conversation');
    Route::post('/delete_single_message', [AcceuilControlller::class, 'delete_single_message'])->name('delete_single_message');
    Route::post('/supprimer_conversation', [AcceuilControlller::class, 'supprimer_conversation'])->name('supprimer_conversation');
    Route::post('/validate_compte', [ConnexionControlle::class, 'validate_compte'])->name('validate_compte');
    Route::post('/update_profil', [ConnexionControlle::class, 'update_profil'])->name('update_profil');
    Route::post('/maj_profil', [ConnexionControlle::class, 'maj_pp'])->name('maj_profil');
    Route::post('/check_profil_chat', [AcceuilControlller::class, 'check_profil_chat'])->name('check_profil_chat');
    Route::post('/check_file_message', [AcceuilControlller::class, 'check_file_message'])->name('check_file_message');
    Route::get('/chare_message/{id_to}', [AcceuilControlller::class, 'chare_message'])->name('chare_message');
});
