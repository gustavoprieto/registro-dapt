<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informe;
use App\Models\Informeable;
use App\Models\Turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurnosController extends Controller
{
    public function __construct(){

      $this->middleware('can:admin.turnos.index')->only('index');
      $this->middleware('can:admin.turnos.create')->only('create','store');
      $this->middleware('can:admin.turnos.edit')->only('edit','update');
      $this->middleware('can:admin.turnos.destroy')->only('destroy');
    }
    
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //@can('admin.users.index')
            $turnos = Turno::where('status',1)->get();
            return view('admin.turnos.index', compact('turnos'));
        //@endcan    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.turnos.create');
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
        $turno = Turno::create($request->all());

        return redirect()->route('admin.turnos.index',$turno)->with('crear', 'si');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Turno $turno)
    // {
    //     return view('admin.turnos.show', compact('turno'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Turno $turno)
    {
        return view('admin.turnos.edit', compact('turno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turno $turno)
    {
        $request->validate([
            'Descripcion' => 'required'
        ]);
        $turno->update($request->all());

        return redirect()->route('admin.turnos.index',$turno)->with('actualiza', 'si');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informe $informe, Turno $turno)  //, Equipo equipo 
    {
    // // **borra en la tabla informes ---status = 2****  
    // $turnosdb = DB::table('informes')
    //                 ->leftJoin('turnos', 'informes.turno_id', '=', 'turnos.id')
    //                 ->where('turnos.id',$turno->id)
    //                 ->update(['informes.status' => 2]);
    
    // $informesrecuperas= Informe::where('turno_id', $turno->id)->get(); 
  
    // // return ($informesrecuperas);
    
    //  // **borra en la tabla informeables ---status = 2****  
    // foreach($informesrecuperas as $informerecupera){
    //          $informeabledb = DB::table('informeables')
    //                 ->leftJoin('informes', 'informeables.informe_id', '=', 'informes.id')
    //                 ->where('informes.id',$informerecupera->id)
    //                 ->update(['informeables.status' => 2]);
    //  }   
       
     // **borra en la tabla turnos ****
       $turnoborra = DB::table('turnos')
                        ->where('id',$turno->id)
                        ->update(['status'=>2]);
     
        return redirect()->route('admin.turnos.index')->with('eliminar', 'ok');
    }
}