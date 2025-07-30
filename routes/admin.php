<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\BienController;
use App\Http\Controllers\ComentarioController;
use Illuminate\Support\Facades\Route;
/*
    aca tenderemos las rutas que nos dirijiran atraves del
    Aca tendremos un controller para seccion, a diferencia de tu proyecto anteriro
*/
//menu
Route::get('/',function(){
    return view('admin.menu');
});//->name('admin.menu');//su nombre es admin.home


//ruta para los bienes
Route::resource('bien',BienController::class);
//mostrar la busqueda mas exacta
Route::post('/buscar/todo',[BienController::class,'index2']);
//mostrar el detalle de un bien (cree una ruta pero se ve mal esteticamente)
Route::get('/buscar/{id}',[BienController::class,'show1']);
//Bajar un bien (cree una ruta pero se ve mal esteticamente)
Route::get('/Bajar/{id}',[BienController::class,'baja']);

//ruta de los comentarios (reparacion)
Route::resource('comentario',ComentarioController::class);


//mostrar los bienes con baja
Route::get('/buscar/baja/todo',[BienController::class,'Bajas']);
//mostrar la busqueda mas exacta
Route::post('/buscar/baja/store',[BienController::class,'index_baja']);
//mostrar el detalle de un bien (cree una ruta pero se ve mal esteticamente)
Route::get('/buscar/baja/{id}',[BienController::class,'baja_show']);






//ruta para areas (ni lo uso XD)
Route::resource('area', AreaController::class);


//ruta de Entrega

Route::get('/entregar',function(){
    return view('admin.entrega');
})->name('ad_ingresar');//su nombre es admin.home