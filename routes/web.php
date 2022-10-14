<?php

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

/*
Route::get('/', function () {
    return view('welcome');
});
 */

Route::get('/', function () {
    return view('auth.login'); 
});

Route::get('show/client/active/{id}', [App\Http\Controllers\PropiedadController::class, 'clientesActivos']); //Visitantes activos

Route::get('show/client/list/propiedad/{id}/{id_user}', [App\Http\Controllers\PropiedadController::class, 'listaPropiedades'])->name('listaPorpiedadesActive'); // Ver lista de propiedades

Route::get('client/list/detail/{id}/{id_user}/{id_cita}', [App\Http\Controllers\PropiedadController::class, 'detalles']);// Ver lista de propiedades

Route::post('ofertar/{id_user}/{id_propiedad}', [App\Http\Controllers\OfertasController::class, 'store']); //Registrar oferta


Route::get('pdf/oferta/{id_user}/{id_propiedad}', [App\Http\Controllers\PropiedadController::class, 'ofertaPDF'])->name('pdf');

Route::get('scraper', [App\Http\Controllers\ScraperController::class, 'scraper'])->name('scraper');

/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/
