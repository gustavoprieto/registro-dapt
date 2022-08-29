<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function __construct(){

      $this->middleware('can:admin.roles.index')->only('index');
      $this->middleware('can:admin.roles.create')->only('create','store');
      $this->middleware('can:admin.roles.show')->only('show');
      $this->middleware('can:admin.roles.edit')->only('edit','update');
      $this->middleware('can:admin.roles.destroy')->only('destroy');
    }
   
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles =Role::paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos = Permission::get();
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permisos','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            // 'permission'=>'required',
        ]);
        $role = Role::create($request->all());
        // $role->syncPermissions($request->input('permission'));
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.index')->with('crear', 'si');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        // $role = Role::find($role->id);
        // $permission = Permission::get();
        // $rolePermission = DB::table('role_has_permissions')
        //                 ->where('role_id', $role->id)
        //                 ->pluck('role_has_permissions. permission_id', 'role_has_permissions.permission_id')
        //                 ->all();
        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role','permissions'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);

        $role->update($request->all());

        $role->permissions()->sync($request->permissions);
        
        return redirect()->route('admin.roles.index',$role)->with('actualiza', 'si');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        DB::table('roles')
        ->where('id', $role->id)
        ->delete();   
       
        $role->delete();
        return redirect()->route('admin.roles.index')->with('eliminar', 'ok');
        
    }
}