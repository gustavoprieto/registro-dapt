<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use App\Models\TipoEquipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoEquiposController extends Controller
{
    public function __construct(){

      $this->middleware('can:admin.tipoequipos.index')->only('index');
      $this->middleware('can:admin.tipoequipos.create')->only('create','store');
      $this->middleware('can:admin.tipoequipos.edit')->only('edit','update');
      $this->middleware('can:admin.tipoequipos.destroy')->only('destroy');
    }
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoequipos = TipoEquipo::where('status',1)->get();
        return view('admin.tipoequipos.index', compact('tipoequipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tipoequipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Descripcion' => 'required'
        ]);
        //return $request->all();
        $tipoequipo = TipoEquipo::create($request->all());

        return redirect()->route('admin.tipoequipos.index',$tipoequipo)->with('crear', 'si');
        }
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Tipoequipo $tipoequipo)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoEquipo $tipoequipo)
    {
        return view('admin.tipoequipos.edit', compact('tipoequipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipoequipo $tipoequipo)
    {
        $request->validate([
            'Descripcion' => 'required'
        ]);
        //return $request->all();
        $tipoequipo->update($request->all());

        return redirect()->route('admin.tipoequipos.index',$tipoequipo)->with('actualiza', 'si'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipoequipo $tipoequipo)
    {
 
    $cant =  DB::table('equipos')->where( 'tipoequipo_id', '=',$tipoequipo->id, ' AND ','status', 1)->count(); 

        if ($cant == 0) {
            $turnoborra = DB::table('tipo_equipos')
            ->where('id',$tipoequipo->id)
            ->update(['status'=>2]);
            return redirect()->route('admin.tipoequipos.index')->with('eliminar','ok');
        } 
        else {
            return redirect()->route('admin.tipoequipos.index')->with('eliminar','no');
        }
    //    return $cant; 
    }
    
    
}