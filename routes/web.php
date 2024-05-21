<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () { /// este es un group general pero con validaciones de roles
    //solo las podra ejecutar el usuario que este autentificado
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');    
    //si lo dejamos esta ruta en este group puede acceder el administrador pero debido al gate de autorizacion no da permiso de avanzar, sin embargo si se cambia de linea al grupo de usuarios generales de contribuyentes funciona la validacion de roles
    /*Route::get('/viewsdictamenes_cap', function () {
        //devolver una vista para el tipo de rol de administrador
        Gate::authorize('viewsdictamenes_cap');
        return view('paginainicial');
    })->name('contri1');*/
});


// CREACION DE ROLES DE USUARIOS  controlador libre de roles 
Route::get('/createxrol', [Controller::class, 'typerol'])->name('ROLE_ADMINISTRADOR.adminAvG');

//asignar rol de usuario
Route::get('/rolxuser',[Controller::class, 'rolasig'])->name('ROLE_ADMINISTRADOR.adminAvG');
//remover rol de usuario
Route::get('/removerolxuser',[Controller::class, 'removerrolasginado'])->name('ROLE_ADMINISTRADOR.adminAvG');
//asignar 
Route::get('/rolxpermisos',[Controller::class,'rolxpermission'])->name('ROLE_ADMINISTRADOR.adminAvG');


Route::get('/remoberrolxpermisos',[Controller::class,'removerrolxpermission'])->name('ROLE_ADMINISTRADOR.adminAvG');



Route::middleware(['role:Contribuyente'])->group(function(){
        ///rutaas solo para contribuyentes del tipo
    //Sin embargo si se cambia de linea al grupo de usuarios generales de contribuyentes funciona la validacion de roles
    Route::get('/viewsdictamenes_cap', function () {
        //devolver una vista para el tipo de rol de administrador
        Gate::authorize('viewsdictamenes_cap');
        return view('paginainicial');
    })->name('Usergeneral');

});
Route::middleware(['role:ROLE_ADMINISTRADOR'])->group(function(){

    Route::get('/seeallviews', function () {
        Gate::authorize('seeallviews');
        return view('admin1');
        //die();
    })->name('ROLE_ADMINISTRADOR.adminAvG');

    Route::get('/json', [Controller::class, 'viewjson'])->name('ROLE_ADMINISTRADOR.adminAvG');


});
Route::middleware(['role:ROLE_ADMINISTRADORJR'])->group(function(){

});
Route::middleware(['role:ROLE_REVISOR'])->group(function(){

});
Route::middleware(['role:ROLE_ESPECIALISTA'])->group(function(){
    Route::get('/user', function () {
        return 'Ruta para usuarios';
    });
    Route::post('/generatorjson', [Controller::class, 'newava'])->name('Dictaminador.post');
});
Route::middleware(['role:ROLE_MUNICIPIO'])->group(function(){

});

Route::middleware(['role:ROLE_USEREXTERNO,ROLE_USERINTERNOS'])->group(function(){

});
