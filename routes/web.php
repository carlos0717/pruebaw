
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Livewire\ObjetivosDesarrolloSostenible;
use App\Livewire\Facultades;
use App\Livewire\Estudiantes;
use App\Livewire\Docentes;
use App\Livewire\Proyectos;
use App\Livewire\Noticias;
use App\Livewire\NoticiasForm;
use App\Models\Noticias as NoticiaModel;
use App\Http\Controllers\NoticiasUploadController;
use App\Livewire\Documentos;
use App\Http\Controllers\ResponsabilidadSocialController;

use App\Livewire\InstitucionTipos;
use App\Livewire\Instituciones;
use App\Livewire\Convenios;
use App\Livewire\Estados;

//controlador noticia imagenes
use App\Http\Controllers\CkeditorImageUploadController;
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
    return view('home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Rutas para nuevas oficinas y vistas con controladores para mostrar noticias y documentos
Route::get('/proyeccion-social', [\App\Http\Controllers\ProyeccionSocialController::class, 'index'])->name('proyeccion.social');
Route::get('/seguimiento-egresado', [\App\Http\Controllers\SeguimientoEgresadoController::class, 'index'])->name('seguimiento.egresado');
Route::get('/extension-universitaria', [\App\Http\Controllers\ExtensionUniversitariaController::class, 'index'])->name('extension.universitaria');

// Vista informativa de Responsabilidad Social
// Route::get('/responsabilidad-social', function () {
//     return view('responsabilidad-social');
// })->name('responsabilidad.social');
Route::get('/responsabilidad-social', [ResponsabilidadSocialController::class, 'index'])
    ->name('responsabilidad.social');

// vista del dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
// Temporal: para pruebas con vistas de ejemplo
// Mejorado: Se añade protección con middleware 'auth' para evitar acceso no autorizado a vistas administrativas
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/users', 'dashboard.users')->name('users.index');
    Route::view('/roles', 'dashboard.roles')->name('roles.index');
    Route::view('/direcciones', 'dashboard.direcciones')->name('direcciones.index');
});

// Rutas individuales para cada sección de Noticias y Documentos (para el menú lateral)

// Gestión Responsabilidad Social
Route::middleware(['role:Administrador,Encargado de RSU'])->group(function () {
    Route::get('/objetivos-desarrollo-sostenible', ObjetivosDesarrolloSostenible::class)->name('objetivos-desarrollo-sostenible');
    Route::get('/facultades', Facultades::class)->name('facultades');
    Route::get('/estudiantes', Estudiantes::class)->name('estudiantes');
    Route::get('/docentes', Docentes::class)->name('docentes');
    Route::get('/proyectos', Proyectos::class)->name('proyectos');
    Route::get('/noticias', Noticias::class)->name('noticias');
    Route::get('/documentos', Documentos::class)->name('documentos');
});

// Ruta para la tarjeta estadística de proyectos por estado
Route::middleware(['role:Administrador,Encargado de RSU'])->group(function () {
    Route::get('/proyectos/estadistica', [\App\Http\Controllers\ProyectosEstadisticaController::class, 'proyectosPorEstado'])->name('proyectos.estadistica');
});

// Gestión Seguimiento y Certificación al Egresado
Route::middleware(['role:Administrador,Encargado de SCE'])->group(function () {
    Route::get('/noticias-egresado', Noticias::class)->name('noticias.egresado');
    Route::get('/documentos-egresado', Documentos::class)->name('documentos.egresado');
});

// Gestión Proyección Social
Route::middleware(['role:Administrador,Encargado de PS'])->group(function () {
    // Gestión de Estados
    Route::get('/estados-gestion', Estados::class)->name('estados.gestion');
    // Gestión de Tipos de Institución
    Route::get('/institucion-tipos-gestion', InstitucionTipos::class)->name('institucion-tipos.gestion');
    // Gestión de Instituciones
    Route::get('/instituciones-gestion', Instituciones::class)->name('instituciones.gestion');
    // Gestión de Convenios
    Route::get('/convenios-gestion', Convenios::class)->name('convenios.gestion');

    Route::get('/noticias-gestion', Noticias::class)->name('noticias.gestion');
    Route::get('/documentos-gestion', Documentos::class)->name('documentos.gestion');
});

// Extensión Universitaria
Route::middleware(['role:Administrador,Encargado de EU'])->group(function () {
    Route::get('/noticias-extension', Noticias::class)->name('noticias.extension');
    Route::get('/documentos-extension', Documentos::class)->name('documentos.extension');
});

// Rutas para crear, editar y mostrar noticias
Route::get('/noticias/create', function () {
    return view('noticias.form', ['modo' => 'create']);
})->name('noticias.create');
Route::get('/noticias/{id}/edit', function($id) {
    return view('noticias.form', ['modo' => 'edit', 'id' => $id]);
})->name('noticias.edit');
Route::get('/noticias/{id}', function($id) {
    // Mejorado: Validación del parámetro $id para evitar posibles ataques de inyección o acceso indebido
    if (!is_numeric($id) || intval($id) != $id) {
        abort(404); // Si el id no es un entero válido, retorna 404
    }
    return app(\App\Http\Controllers\NoticiaController::class)->show($id);
})->name('noticias.show');

/* Route::post('/noticias/upload', [NoticiasUploadController::class, 'upload'])->name('noticias.upload');
require __DIR__.'/ckeditor_upload.php'; */
Route::post('/ckeditor/upload', [CkeditorImageUploadController::class, 'upload'])
     ->middleware(['auth', 'verified']) // ¡Importante! Protege la ruta
     ->name('ckeditor.upload');

Route::get('/documentos', Documentos::class)
->name('documentos');


// Ruta de la clase que controla el formulario de contacto de RSU
Route::post('/contacto-rsu', [ResponsabilidadSocialController::class, 'contactoRSU'])
    ->name('contacto.rsu');