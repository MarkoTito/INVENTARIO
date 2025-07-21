<?php
use Illuminate\Support\Facades\Route;
/*
    aca tenderemos las rutas que nos dirijiran atraves del
    Aca tendremos un controller para seccion, a diferencia de tu proyecto anteriro
*/
//menu
Route::get('/',function(){
    return view('admin.menu');
});//->name('admin.menu');//su nombre es admin.home

//ruta de ingreso

Route::get('/create',function(){
    return view('admin.ingresar');
})->name('ad_ingresar');//su nombre es admin.home

//ruta de busqueda

Route::get('/index',function(){
    return view('admin.buscar');
})->name('ad_ingresar');//su nombre es admin.home

//ruta de Reparacion

Route::get('/buscar/reparar',function(){
    return view('admin.reparar');
})->name('ad_ingresar');//su nombre es admin.home

//ruta de Entrega

Route::get('/entregar',function(){
    return view('admin.entrega');
})->name('ad_ingresar');//su nombre es admin.home