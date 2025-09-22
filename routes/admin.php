<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\BajaController;
use App\Http\Controllers\BienController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\DigitalController;
use App\Http\Controllers\SedesController;
use App\Http\Controllers\SistemasController;
use App\Http\Controllers\TiposController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Database\Seeders\SedeSeeder;
use Illuminate\Support\Facades\Route;
/*
    aca tenderemos las rutas que nos dirijiran atraves del
    Aca tendremos un controller para seccion, a diferencia de tu proyecto anteriro
*/
//menu
Route::get('/',function(){
    return view('admin.menu');
});//->name('admin.menu');//su nombre es admin.home


//ruta para los bienes FISICOS
Route::resource('bien',BienController::class);

//ruta para los bines digitos
Route::resource('digital',DigitalController::class);
//mostrar el detalle de un digital (cree una ruta pero se ve mal esteticamente)
Route::get('/buscar/digital/{id}',[DigitalController::class,'show2']);


//mostrar la busqueda mas exacta
Route::post('/buscar/todo',[BienController::class,'index2']);
//mostrar la busqueda mas exacta PERO CON CODIGO
Route::post('/buscar/todo/code',[BienController::class,'index3']);

//mostrar el detalle de un bien (cree una ruta pero se ve mal esteticamente)
Route::get('/buscar/{id}',[BienController::class,'show1']);
//Bajar un bien (cree una ruta pero se ve mal esteticamente)
Route::get('/Bajar/{id}',[BajaController::class,'baja']);
//revertir baja
Route::get('/Bajar/revertir/{id}',[BajaController::class,'revertirbaja']);

//Bajar editar un bien:
Route::get('/Editar/Hardware/{id}',[BienController::class,'H_editar']);

//mostrar el historial
Route::get('/buscar/historial/{id}',[BienController::class,'historial']);
//generar el PDF
Route::get('/baja/{bien}/pdf',[BienController::class,'pdf']);
//para las imagenes:
Route::post('bien/dropzone',[BienController::class,'dropzone'])->name('bien.dropzone');


//para los archivos carga interna
Route::post('digital/dropzone',[DigitalController::class,'dropzone'])->name('digital.dropzone');

//para los archivos carga interna baja
Route::post('digital/cancel/dropzone/{idCifrado}',[DigitalController::class,'bajDigitaldropzone']);

//para agregar archivos (FORM)
Route::post('digital/agregar/dropzone',[DigitalController::class,'agregarArchi']);

//para agregar archivos 
Route::post('digital/add/dropzone/{idCifrado}',[DigitalController::class,'adddropzone']);

//Cancelar software con doc
Route::get('digital/cancelar/dropzone/{digital}',[DigitalController::class,'Canceldropzone']);

//ruta de los comentarios (reparacion)
Route::resource('comentario',ComentarioController::class);
//generar comentario sin pdf
Route::get('/comentario/creacion/{code}',[ComentarioController::class,'index2']);
//generar comentario con pdf
Route::get('/comentario/pdf/creacion/{code}',[ComentarioController::class,'index2Pdf']);

//generar comentario en la BD
Route::post('/reparar/creacion',[ComentarioController::class,'reparacion']);




//generar baja

Route::resource('baja',BajaController::class);

Route::get('/baja/creacion/{code}',[BajaController::class,'index_bajar']);
//formular de revertir baja
Route::get('/revercion/creacion/{code}',[BajaController::class,'reversion']);

//mostrar los bienes 
Route::get('/buscar/baja/todo',[BienController::class,'Bajas']);
//mostrar la busqueda mas exacta
Route::post('/buscar/digital/store',[DigitalController::class,'index_baja']);
//editar digital
Route::post('/digital/editar',[DigitalController::class,'actualizar']);  

//mostrar el detalle de un bien (cree una ruta pero se ve mal esteticamente)
Route::get('/buscar/baja/{id}',[BienController::class,'baja_show']);
//mostrar el historial debjas
Route::get('/buscar/historial/bajas/{id}',[BajaController::class,'historial']);


//menu para agegar mas cosas
Route::get('/Agregar',[BienController::class,'agregar']);

//ruta exportar bienes en pdf y excell (menu)
Route::get('/exportar',[BienController::class,'export']);
//ruta exportar bienes en pdf y excell (encontrado)
Route::post('/exportacion/encontrado',[BienController::class,'exportDatps']);

//ruta para descar bienes en excell
Route::get('/exportacion/encontrado/excel',[BienController::class,'dowloadExport'])->name('export.excell');
//ruta para descar bienes en excell
Route::get('/exportacion/encontrado/pdf',[BienController::class,'dowloadExportPdf'])->name('export.pdf');


//ruta para areas ()
Route::resource('sedes', SedesController::class);
Route::get('sedes/{sede}/disable', [SedesController::class, 'disable'])->name('sedes.disable');
Route::get('sedes/{sede}/habilitar', [SedesController::class, 'habilitar'])->name('sedes.habilitar');
//ruta para areas ()
Route::resource('area', AreaController::class);
//ruta para tipos ()
Route::resource('tipos', TiposController::class);
//ruta para sistemas
Route::resource('sistemas', SistemasController::class);
//ruta para usuario
Route::resource('usuario', UserController::class); //ojo aca
Route::post('/eliminar/usuario/{id}',[UserController::class,'eliminar']);

