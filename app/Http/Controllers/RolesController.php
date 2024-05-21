<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Avaluo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Contracts\Permission;

class RolesController extends Controller
{

    //create contructor para generar un middleware
    function __construct()
    {
        $this->middleware('permission:see-rol | create-rol | edit-rol | delete-rol',['only' => ['index']]); ///con solo permiso en el metodo index

        $this->middleware('permission:create-rol',['only' => ['create', 'store']]); 

        $this->middleware('permission:edit-rol | delete-rol',['only' => ['edit','update']]);

        $this->middleware('delete-rol',['only' => ['destroy']]); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //hacer referencia al modelo de roles
        $avaluos = Avaluo::paginate(5);
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //uso de permisos
        $permission = Permission::get();
        return view('roles.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar campos a ingresar
        $this->validate($request, ['name' => 'required' , 'permission' => 'required']);
        $role = Avaluo::create(['namecontribuyente' => $request->input('name'), 'anioval' => $request->input('anio')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        Avaluo::find($id);
        $permission = Permission::get();
        //$rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id',$id)
        //->pluck('role_has_permissions.');

        //recupeerar valores con pluck
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
