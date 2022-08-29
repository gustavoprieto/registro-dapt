<?php

namespace App\Http\Controllers;
use App\Models\Informe;

use Illuminate\Http\Request;

class BuscaController extends Controller
{

    public function __construct(){

      $this->middleware('can:admin.informes.buscar')->only('indexbusca');

    }
    
    // function __construct(){  
    //     $this->middleware('Permission:ver-informes | crear-informes | editar-informes | eliminar-informes')->only('index');
    //     $this->middleware('Permission:crear-informes', ['only'=>'index', 'store']);
    //     $this->middleware('Permission:editar-informes', ['only'=>'edit', 'update']);
    //     $this->middleware('Permission:eliminar-informes', ['only'=>'destroy']);
    // }
    
    public function indexbusca(Request $request){
        
       // 'fechaFinal' => 'required|after_or_equal:fechaInicial',
       //$informeables =Informeable::where('informe_id',$informe->id, ' and ', 'status','1')->get();
         $request->validate([
          'fecha_hasta' => 'required|after_or_equal:fecha_desde',
          ]); 


    if (($request->turnos==null)and ($request->Pronosticador==null)) {
        $informes = Informe::where('status', 1)
            ->where('Fecha','>=' ,$request->fecha_desde)
            ->where('Fecha','<=' ,$request->fecha_hasta)
            ->latest('id')
            ->paginate(20);
    }
    if (($request->turnos==null)and ($request->Pronosticador<>null)) {
        $informes = Informe::where('status', 1)
            ->where('usuario_id', $request->Pronosticador)
            ->where('Fecha','>=' ,$request->fecha_desde)
            ->where('Fecha','<=' ,$request->fecha_hasta)
            ->latest('id')
            ->paginate(20);
    }
    if (($request->turnos<>null)and ($request->Pronosticador==null)) {
        $informes = Informe::where('status', 1)
            ->where('turno_id',$request->turnos)
            ->where('Fecha','>=' ,$request->fecha_desde)
            ->where('Fecha','<=' ,$request->fecha_hasta)
            ->latest('id')
            ->paginate(20);
    }
    if (($request->turnos<>null)and ($request->Pronosticador<>null)) {
        $informes = Informe::where('status', 1)
            ->where('turno_id',$request->turnos)
            ->where('usuario_id', $request->Pronosticador)
            ->where('Fecha','>=' ,$request->fecha_desde)
            ->where('Fecha','<=' ,$request->fecha_hasta)
            ->latest('id')
            ->paginate(20);
    }
    return view('informe.index', compact('informes'));
    }
}