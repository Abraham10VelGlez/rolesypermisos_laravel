<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

//spatie
use Spatie\Permission\Traits\HasRoles;

class Avaluo extends Model
{
     //use HasFactory;
   use HasFactory, Notifiable;

   //activamos roles en el modelo de avaluo
   use HasRoles;
   
   // columnas
   protected $fillable = [
      //variables propias
      'id',
      'namecontribuyente',
      'anioval',      
      //variables relacion
       'ingresoidfk', //refencia al folio que se trabaja
       'tipopredio', // tipo de  Predio del Avalúo 
       'iduserfk', // id del especialista que realiza el llenado
       'created_at',
        'updated_at'

   ];
   
   /*DEFINICION DE LLAVE PRIMARYA*/
   protected $primaryKey = 'id';
}
