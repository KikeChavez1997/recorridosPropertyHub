<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController; 


Route::get('index', [App\Http\Controllers\IndexHomeController::class, 'show'])->middleware('can:inicio')->name('inicio'); // Home cliente

Route::post('create', [App\Http\Controllers\IndexHomeController::class, 'store'])->middleware('can:crear.cliente')->name('crear.cliente'); // crear  Cliente

Route::delete('delete/{id}', [App\Http\Controllers\IndexHomeController::class, 'destroy'])->middleware('can:borrar.cliente')->name('borrar.cliente'); // borrar Cliente

Route::delete('delete/cita/{id}', [App\Http\Controllers\AgendarCitaController::class, 'destroy'])->middleware('can:borrar.cita')->name('borrar.cita'); // borrar Cita

Route::get('show/{id}', [App\Http\Controllers\IndexHomeController::class, 'ficha'])->middleware('can:ver.propiedades.cliente')->name('ver.propiedades.cliente'); // ver propiedades del cliente

Route::get('show/cita/{id}', [App\Http\Controllers\AgendarCitaController::class, 'show'])->name('ver.citas.cliente'); // Ver citas

Route::post('addfecha', [App\Http\Controllers\AgendarCitaController::class, 'store'])->middleware('can:crear.cita')->name('crear.cita'); // agregar cita

Route::get('edit/fecha/{id}', [App\Http\Controllers\AgendarCitaController::class, 'edit'])->name('editar.cita');

Route::patch('update/cita/{id}', [App\Http\Controllers\AgendarCitaController::class, 'update'])->name('actualizar.cita'); // editar clientes

Route::get('edit/user/{id}', [App\Http\Controllers\IndexHomeController::class, 'edit'])->middleware('can:editar.cliente')->name('editar.cliente'); // editar clientes

Route::patch('update/user/{id}', [App\Http\Controllers\IndexHomeController::class, 'update'])->middleware('can:actualizar.cliente')->name('actualizar.cliente'); // editar clientes

Route::patch('update/cita/unique/{id}', [App\Http\Controllers\PropiedadController::class, 'updateCita'])->name('unique.cita');

Route::patch('update/cita/fin/{id}', [App\Http\Controllers\PropiedadController::class, 'updateCitaFin'])->name('unique.cita.fin');

Route::patch('update/confirmacion/unique/{id}', [App\Http\Controllers\PropiedadController::class, 'updateConfirmacion'])->name('unique.confirmacion');

Route::patch('update/reconfirmacion/unique/{id}', [App\Http\Controllers\PropiedadController::class, 'updateReConfirmacion'])->name('unique.reconfirmacion');
/////////////////////////////////////////////////// Controladores para propiedad
 
Route::delete('delete/propiedad/{id}', [App\Http\Controllers\PropiedadController::class, 'destroy'])->middleware('can:crear.propiedad')->name('borrar.propiedad'); // borrar propiedad
 
Route::post('addproperties', [App\Http\Controllers\PropiedadController::class, 'store'])->middleware('can:crear.propiedad')->name('crear.propiedad'); // agregar propiedad 

Route::get('add/properties', [App\Http\Controllers\PropiedadController::class, 'create'])->middleware('can:crear.propiedad')->name('crear.propiedad.unique'); // agregar propiedad 

Route::get('show/propiedad/{id}', [App\Http\Controllers\PropiedadController::class, 'edit'])->name('editar.propiedad'); // editar propiedad

Route::patch('update/propiedad/{id}', [App\Http\Controllers\PropiedadController::class, 'update'])->middleware('can:actualizar.propiedad')->name('actualizar.propiedad'); // actualizar propiedad

////////////////////////////////////////////////////////////////////////////

Route::resource('users', UserController::class)->middleware('can:users.create')->names('users');

Route::get('user/edit/data/{id}', [App\Http\Controllers\UserController::class, 'editData'])->middleware('can:users.index')->name('userData');

Route::put('user/update/data/{id}', [App\Http\Controllers\UserController::class, 'updateData'])->middleware('can:users.index')->name('updateData');

Route::get('ofertas/usuarios', [App\Http\Controllers\UserController::class, 'showOfertas'])->middleware('can:users.index')->name('mostrar.ofertas'); // mostrar opfertas

Route::get('oferta/pdf/{id_user}/{id_propiedad}/{id}', [App\Http\Controllers\OfertasController::class, 'pdf'])->middleware('can:users.index')->name('imprimir.pdf'); // mostrar opfertas

////////////////////////////////////////////////////

Route::get('edit/future', [App\Http\Controllers\IndexHomeController::class, 'futuro'])->middleware('can:inicio')->name('inicio.futuro'); //Clientes futuros

Route::get('edit/desc', [App\Http\Controllers\IndexHomeController::class, 'descartado'])->middleware('can:inicio')->name('inicio.descartado');

///////////////////////////////////////////////////

Route::get('asesor/create', [App\Http\Controllers\AsesoresComercialesController::class, 'index'])->middleware('can:inicio')->name('inicio.asesor'); //Asesor comercial

Route::get('asesor/create/comercial', [App\Http\Controllers\AsesoresComercialesController::class, 'comercial'])->middleware('can:inicio')->name('inicio.asesor.comercial'); //Asesor comercial

//////////////////////////////////////////// Calendario

Route::get('asesor/calendar/{id}/{name}', [App\Http\Controllers\AgendarCitaController::class, 'asesorCalendar'])->name('asesorCalendar'); // editar clientes

Route::get('evento/mostrar', [App\Http\Controllers\EventosController::class, 'show'])->name('eventos');

Route::post('evento/editar/{id}', [App\Http\Controllers\EventosController::class, 'edit'])->name('edit.eventos');