<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use App\Models\TipoEquipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

      $this->middleware('can:admin.equipos.index')->only('index');
      $this->middleware('can:admin.equipos.create')->only('create','store');
      $this->middleware('can:admin.equipos.edit')->only('edit','update');
      $this->middleware('can:admin.equipos.destroy')->only('destroy');
    }


     
    public function index()
    {
        $equipos = Equipo::where('status',1)->latest('id')->paginate(10);
        return view('admin.equipos.index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     // $tipoequipos= TipoEquipo::where('status',1)->get();
    //   $equipodescripcion = array();
    //   foreach ($tipoequipos as $tipoequipo) {
    //     $equipodescripcion[] = $tipoequipo->Descripcion;
    //   }
    $tipoequipos=Tipoequipo::where('status', 1)->pluck('Descripcion','id');
    //return $tipoequipos;
    return view('admin.equipos.create', compact('tipoequipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
     // return $request;
         $request->validate([
         'Nombre' => 'required',
         'tipoequipo_id'=>'required'
         ]);
       // return $request;
      $equipo = Equipo::create($request->all());
       
       // return $request->tipoequipo_id;
      return redirect()->route('admin.equipos.index',$equipo)->with('crear', 'si');
    }


    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // // public function show(Equipo $equipo)
    // // {
    // //     //
    // // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        
        $tipoequipos=Tipoequipo::where('status', 1)->pluck('Descripcion','id');
        return view('admin.equipos.edit', compact('equipo','tipoequipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
     $request->validate([
         'Nombre' => 'required',
         'tipoequipo_id'=>'required'
         ]);
        $equipo->update($request->all());
       
        return redirect()->route('admin.equipos.index',$equipo)->with('actualiza', 'si');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
    $turnoborra = DB::table('equipos')
        ->where('id',$equipo->id)
        ->update(['status'=>2]);
     
    return redirect()->route('admin.equipos.index')->with('eliminar', 'ok');
    }
} 

        
    