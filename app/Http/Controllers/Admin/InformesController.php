<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use App\Models\Estado;
use App\Models\Informe;
use App\Models\Informeable;
use App\Models\TipoEquipo;
use App\Models\Turno;
use Carbon\Carbon;
use Database\Factories\informeableFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class InformesController extends Controller
{
    public function __construct(){

      
      $this->middleware('can:admin.informes.create')->only('create','store');
      $this->middleware('can:admin.informes.edit')->only('edit','update');
      $this->middleware('can:admin.informes.destroy')->only('destroy');
    }

    // function __construct(){  
    //     $this->middleware('Permission:ver-informes | crear-informes | editar-informes | eliminar-informes')->only('index');
    //     $this->middleware('Permission:crear-informes', ['only'=>'index', 'store']);
    //     $this->middleware('Permission:editar-informes', ['only'=>'edit', 'update']);
    //     $this->middleware('Permission:eliminar-informes', ['only'=>'destroy']);
    // }    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipos= Equipo::where('status',1)->get();
        $tipoequipos = TipoEquipo::where('status',1)->get();
        $turnos = Turno::where('status', 1)->pluck('Descripcion','id');
        $estados = Estado::where('status',1)->pluck('Descripcion','id'); 
        $hoy =  Carbon::now();
        return view('admin.informes.create', compact('equipos', 'tipoequipos','turnos', 'estados', 'hoy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $informe_id = 0;
        $equipos= Equipo::where('status',1)->get();
        $tipoequipos = TipoEquipo::where('status',1)->get();

    //************************************* */
                $informes = DB::insert(
                                'INSERT INTO informes (Fecha, usuario_id, turno_id, comentario, created_at,updated_at)
                                VALUES (:Fecha, :usuario_id, :turno_id, :comentario, :created_at, :updated_at)', [
                                    'Fecha'=> $request->fecha,
                                    'usuario_id'=> auth()->user()->id,
                                    'turno_id'=>$request->turno,
                                    'comentario'=>$request->comentario,
                                    'created_at'=>Carbon::now(),
                                    'updated_at'=>Carbon::now()
                            ]);                              
                
        $informe_id = informe::max('id');
        
        $numero = count($request->estado);
        $elemento = 0;
        foreach($tipoequipos as $tipoequipo){
            foreach($equipos as $equipo){
                if($tipoequipo->id == $equipo->tipoequipo_id){ 
                        $informeables = DB::insert(
                            'INSERT INTO informeables (estado_id, comentario, equipo_id, tipoequipo_id, informe_id, created_at,updated_at)
                            VALUES (:estado_id,:comentario, :equipo_id, :tipoequipo_id, :informe_id, :created_at, :updated_at)', [
                                    'estado_id'=>$request->estado[$elemento],
                                    'comentario'=>$request->comentario,
                                    'equipo_id' => $equipo->id,
                                    'tipoequipo_id'=> $tipoequipo->id,
                                    'informe_id'=>$informe_id,
                                    'created_at'=>Carbon::now(),
                                    'updated_at'=>Carbon::now()
                                    
                                 ]);
                    $lugar =$elemento++;
                }
            }
        }
            // 

    cache::flush();
            
    // return $request;
        
        //***************               
                                   
       // return $request->tipoequipo_id;
       return redirect()->route('informe.index')->with('crear', 'si');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Informe $informe)
    {
        // return $informe;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Informe $informe)
    {
        $estados = Estado::where('status',1)->get(); 
        $informeables =Informeable::where('informe_id',$informe->id)->get();
        return view('admin.informes.edit', compact('informe', 'informeables', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informe $informe)
    {
        //or ('can:admin.users.create')
       if(($informe->usuario_id== auth()->user()->id) or (auth()->user()->roles()->first()->name=="ADMINISTRADOR" )){
       
        $infoanteriores = Informe::where('id',$informe->id)->get();
        
        $informeables =Informeable::where('informe_id',$informe->id)->get();
        $informe_id = 0;

        foreach($infoanteriores as $infoanterior){
            if($infoanterior->comentario <>$request->comentario){
                $actualiza2 = DB::table('informes')
                ->where('id',$informe->id)
                ->update(['comentario'=>$request->comentario]);
            }
        }

        foreach ($informeables as $informeable) {
            $numeroregistro = $informeable->id;
            if($informeable->estado_id <> $request->estado[$informe_id]){
                $actualiza2 = DB::table('informeables')
                    ->where('id',$numeroregistro)
                    ->update(['estado_id'=>$request->estado[$informe_id]]);
            }
            $informe_id++;
        }
        cache::flush();
     return redirect()->route('informe.show', $informe)->with('actualiza', 'si');
       }else{
        return redirect()->route('informe.show', $informe)->with('actualiza', 'no');
       }
       
      // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informe $informe)
    {
        // return $this->role->name;
        $turnoborra1 = DB::table('informes')
        ->where('id',$informe->id)
        ->update(['status'=>2]);

        $turnoborra2 = DB::table('informeables')
        ->where('informe_id',$informe->id)
        ->update(['status'=>2]);

        cache::flush();
        return redirect()->route('informe.index')->with('eliminar', 'ok');
    }

    public function indexbusca(Request $request){
        
       // 'fechaFinal' => 'required|after_or_equal:fechaInicial',
       cache::flush();
        return $request->fecha_hasta;
    }

}