<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use PhpParser\Node\Stmt\Return_;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;



    public function viewjson()
    {
        //forma 1 de detener que el usario acceda al json de la funcion y a su contenido
        Gate::authorize('combo_n');
        $fkespecialista = Auth::user();
        //dd($fkespecialista);
        return $fkespecialista->toJson(JSON_PRETTY_PRINT);


        //forma 2 validar con can si este usuario puede validar esa informacion
        /*if (auth()->user()->can('edit views')) {
            // Aquí va la lógica para editar el artículo
            
            $fkespecialista = Auth::user();
            //dd($fkespecialista);
            return $fkespecialista->toJson(JSON_PRETTY_PRINT);

        } else {
            abort(403, 'No tienes permiso para editar este artículo.');
        }*/
    }


    public function newava(Request $request)
    {
        //forma 1 de detener que el usario acceda al json de la funcion y a su contenido
        //Gate::authorize('combo_n');   

        $fkespecialista = Auth::user();
        printf($fkespecialista);
    }

    public function typerol()
    {
        //CREACION DE ROLES
        /*
        $role = Role::create(['name' => 'Contribuyente']);
        $role = Role::create(['name' => 'ROLE_ADMINISTRADOR']);
        $role = Role::create(['name' => 'ROLE_ADMINISTRADORJR']);
        $role = Role::create(['name' => 'ROLE_REVISOR']);
        $role = Role::create(['name' => 'ROLE_ESPECIALISTA']);
        $role = Role::create(['name' => 'ROLE_MUNICIPIO']);
        $role = Role::create(['name' => 'ROLE_USEREXTERNO']);
        $role = Role::create(['name' => 'ROLE_USERINTERNOS']);
        */

        //CREACION  DE PERMISSOS    
        //$permission = ModelsPermission::create(["name" => "Create", "guard_name" => 'web']);
        //$permission = ModelsPermission::create(["name" => "Update", "guard_name" => 'web']);
        //$permission = ModelsPermission::create(["name" => "View", "guard_name" => 'web']);
        //$permission = ModelsPermission::create(["name" => "Delete", "guard_name" => 'web']);
        //$permission = ModelsPermission::create(["name" => "Edit", "guard_name" => 'web']);
        //CREACION  DE PERMISSOS        

        ///creacion de role_has_permissions ( rol por permiso)
        //seleccionar al usuairo autentificado
        //$user = Auth::user();
        //return $user;
        //return $user->role;
        //seleccionar rol de usuario
        //$getrole = Role::findById(2);
        //return $getrole;
        //return $getrole->id;
        //da permisos de rol x permiso osea da 3 permisos por el rol para este caso es el rol 2 (ADministrador)
        //$getrole->permissions()->sync(["1","2","3"]);///create user
        //$getrole->permissions()->sync("2",$getrole->id);///delete user
        //$getrole->permissions()->sync("3",$getrole->id);///update user        


        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //validar si existe un permiso con el siguiente metodo
        //$resultad = $getrole->hasPermissionTo(1); /// validar si el permiso existe devolviendo un booleano
        //dd($resultad);


        ///asignar roles a permisos public.model_has_roles;
        //return $user;        
        // se interpreta como: Del modelo usuario con nombre administrador  se le asigno 5 tipos de roles
        //$booleanavg = $user->roles()->sync(["1","2","3","4","5"]);
        // se interpreta como: Del modelo usuario con nombre administrador  se le asigno 1 tipo de rol de ADMINISTRADOR
        //$booleanavg = $user->roles()->sync(["1"]);
        //dd($booleanavg);



        //metodo para saber los roles de un usaurio
        //$retul = $user->hasAnyRole(2);
        //dd($retul);


        //como ocultar funcionalidades por usuarios o solo usar permisos     
        /*$resuyltado = $user->can('Create');
        dd($resuyltado);*/


        //proteger url y rutas

        //creacion de un permiso
        //$permission = ModelsPermission::create(["name" => "Administrador config", "guard_name" => 'web']);
        // agregar a rol x permiso
        //$getrole->permissions()->sync(["1","2","3","6"]);

        ///todos los permisos
        //$permissions = ModelsPermission::all();
        //return $permissions;

        // Crear roles y asignar permisos
        //$getrole1 = Role::findById(1); ///contribuyente
        //$getrole2 = Role::findById(2); ///administrador
        //$getrole3 = Role::all();///todos los roles
        //return $getrole3;        
        //$permission = ModelsPermission::findByName('Delete', 'web');
        //$ress = $getrole2->givePermissionTo($permission);
        //return $ress;

        //validar si existe un permiso con el siguiente metodo
        //$getrole = Role::findById(2);
        //return $getrole;

        // verificarlo usando el método hasPermissionTo que
        // recibe como parámetro el permiso a evaluar y devuelve un valor booleano de la siguiente forma:

        ///validar puede ser con numeros debido a q son permisos con un id
        //$resultad = $getrole->hasPermissionTo(5); 
        ///validar puede ser con el nombre del permiso
        //$resultad = $getrole->hasPermissionTo('Administrador config');
        //$resultad = $getrole->hasPermissionTo('Delete'); 
        //$resultad = $getrole->hasPermissionTo('Create'); 
        //dd($resultad);

        /*
        $getrole = Role::findById(2);
        $a = $getrole->hasPermissionTo('Create'); // Validamos que el rol contenga el permiso
        if( $getrole->hasPermissionTo('Create') === true ){
            echo"permiso correcto";
        }else{
            echo"no tiene ese permiso";
        }
        */
        //dd($a);
        //$b = $getrole->revokePermissionTo('Create'); // Eliminamos el permiso del rol
        //dd($b);


        // Asignar roles a los usuarios
        /*$user = User::find(3); // O el ID del usuario al que quieres asignar el rol
        $roleAdmin = Role::findById(5);
        //return $roleAdmin;
        $resultado = $user->assignRole($roleAdmin);
        return $resultado;*/

        // REMOVER AsignaCION  roles a los usuarios
        //$user = User::find(2); // Encuentra al usuario por su ID        
        //return $user;
        //$resultado = $user->removeRole('Contribuyente'); // Remueve el rol 'Admin'
        //return $resultado;
        return "hola";
    }


    public function rolasig()
    {
        // Asignar roles a los usuarios
        $user = Auth::user(); // O el ID del usuario al que quieres asignar el rol
        //return $user;
        //tipo de rol contribuyente 1  administrador 2
        $roleAdmin = Role::findById(1);
        //return $roleAdmin->name;
        $resultado = $user->assignRole($roleAdmin);
        $ms = "ASIGNASTE UN ROL DE " . $roleAdmin->name . " AL USUARIO " . $user->name . " CON NUMERO DE ROL" . $user->role;
        return view('home', compact('ms'));
    }

    public function removerrolasginado()
    {
        // REMOVER AsignaCION  roles a los usuarios
        $user = Auth::user(); // Encuentra al usuario por su ID        
        //return $user;
        //tipo de rol contribuyente 1
        $roleAdmin = Role::findById(1);
        $resultado = $user->removeRole($roleAdmin->name); // Remueve el rol 'Admin'
        $ms = "REMOVI UN ROL DE " . $roleAdmin->name . " AL USUARIO " . $user->name . " CON NUMERO DE ROL" . $user->role;
        return view('home', compact('ms'));
    }


    public function rolxpermission()
    {
        ///creacion de role_has_permissions ( rol por permiso)
        //seleccionar al usuairo autentificado
        $user = Auth::user();
        //return $user;
        //return $user->role;
        //seleccionar rol de usuario de administrador
        $getrole = Role::findById(2);
        //return $getrole;
        //return $getrole->id;
        //da permisos de rol x permiso osea da 6 permisos
        // por el rol de administrador para este caso es el rol 2 (Administrador)
        $getrole->permissions()->sync(["1", "2", "3", "4", "5", "6"]); /// son 6 permisos diferentes de la tabla de permisos SELECT * FROM permissions --------6 PERMISOS 

        $ms = "SE DIERON TODOS LOS PERMISOS PARA UN ROL DE " . $getrole->name . " AL ROL " . $user->name . " CON NUMERO DE ROL" . $user->role;
        return view('home', compact('ms'));
    }


    public function removerrolxpermission()
    {

        //seleccionar al usuairo autentificado
        $user = Auth::user();
        //selecciona el rol a quitar permiso recordando que tiene los 6 permisos el rol de administrador
        $getrole = Role::findById(2);
        $permission = ModelsPermission::findByName('Create'); // Encuentra el permiso por su nombre        
        $getrole->revokePermissionTo($permission); // Remueve el permiso del rol

        $ms = "SE REMOVIO EL PERMISO DE " . $permission->name . " AL ROL " . $getrole->name . " CON NUMERO DE ROL" . $user->role;
        return view('home', compact('ms'));
    }
}

/*
SELECT * FROM  public.model_has_permissions ------0
 
SELECT * FROM  public.model_has_roles   
-------- 1 USER ---- 2 --- esta tabla almacena los middleware por usuario
--- pero debes Asignar roles a los usuarios para que funcione -- assignRole,
-- para remover un rol debes usar REMOVER AsignaCION  roles a los usuarios
--removeRole

SELECT * FROM public.role_has_permissions ------- 2 ROLE  -------TIENE 4 PERMISOS   

SELECT * FROM permissions --------6 PERMISOS

SELECT * FROM "roles" ----- 8 ROLES

select * from users
 */
