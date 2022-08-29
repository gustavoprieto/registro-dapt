<?php

use App\Http\Controllers\Admin\EquiposController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TurnosController;
use App\Http\Controllers\Admin\EstadosController;
use App\Http\Controllers\Admin\InformesController;
use App\Http\Controllers\Admin\TipoEquiposController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PdfsController;
use App\Models\User;
use Illuminate\Routing\Route as RoutingRoute;

use App\Http\Controllers\Admin\RolesController;


//Route::get('/', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

//Route::get('/', [HomeController::class, 'inicio'])->name('admin.home');

//Route::get('informes', [InformeController::class,'index'])->name('informe.index');

Route::resource('turnos', TurnosController::class)->except('show')->names('admin.turnos');

Route::resource('estados', EstadosController::class)->except('show')->names('admin.estados');

Route::resource('equipos', EquiposController::class)->except('show')->names('admin.equipos');

Route::resource('tipoequipos', TipoEquiposController::class)->except('show')->names('admin.tipoequipos');

Route::resource('informes', InformesController::class)->names('admin.informes');

Route::resource('users',UsersController::class)->except('show')->names('admin.users');
// Route::resource('users',UsersController::class)->only('index','edit','update')->names('admin.users'); eliminar los otros metodos

Route::resource('roles', RolesController::class)->names('admin.roles');

Route::resource('pdfs', PdfsController::class)->names('admin.pdfs');
//https://www.youtube.com/watch?v=n04ic-ALRvw