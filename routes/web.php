<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\BuscaController;
use Illuminate\Support\Facades\Auth;

//controladores para roles y permisos


//si
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

//Auth::routes[('reset'=> false)];
//Auth::routes[('reistr'=> false)];


//comento*****
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', [InformeController::class,'index'])->name('informe.index');
    // https://www.youtube.com/watch?v=cEIU9a3CS7M
});



Route::get('informe/{informe}', [InformeController::class,'show'])->name('informe.show');

Route::post('busca', [BuscaController::class,'indexbusca'])->name('admin.informes.indexbusca');

// https://www.youtube.com/watch?v=9vgUe5ZkweM
// php artisan r:l

Route::get('informe', [InformeController::class,'buscar'])->name('admin.informes.buscar');


Route::get('imprimir/{informe}', [InformeController::class,'imprimir'])->name('informe.imprimir');


Route::get('descargar', [InformeController::class,'descargar'])->name('informe.descargar');