<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Estado;
use App\Models\Informe;
use App\Models\Informeable;
use App\Models\TipoEquipo;
use App\Models\Turno;
use Carbon\Carbon;
use Carbon\Doctrine\DateTimeType;
use Carbon\CarbonTimeZone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class InformeController extends Controller
{
    public function __construct(){

      $this->middleware('can:informe.index')->only('index');
      $this->middleware('can:informe.show')->only('show');
      $this->middleware('can:admin.informes.buscar')->only('buscar');
      $this->middleware('can:informe.imprimir')->only('imprimir');
    }
        
    // function __construct(){  
    //     $this->middleware('Permission:ver-informes | crear-informes | editar-informes | eliminar-informes')->only('index');
    //     $this->middleware('Permission:crear-informes', ['only'=>'index', 'store']);
    //     $this->middleware('Permission:editar-informes', ['only'=>'edit', 'update']);
    //     $this->middleware('Permission:eliminar-informes', ['only'=>'destroy']);
    // }
    
    public function index(){
        // if (request()->page) {
        //     $key= 'post'. request()->page;
        // } else {
        //     $key= 'post';
        // }
        

        // if (cache::has($key)) {
        //     $informes =cache::get($key);
        // } else {
        //     $informes = Informe::where('status',1)->latest('id')->paginate(30);
        //     cache::put($key, $informes);
        // }


        $informes = Informe::where('status',1)->latest('id')->paginate(10);  //('id','>=','1')
        //$informes = $ordenar->sortByDesc('id'); //->syncWithoutDetachig();
        return view('informe.index', compact('informes'));
    }

    public function show (Informe $informe){
        //$informe = Informe::where('id',$informe->id)->get();
        // $equipos = Equipo::where('status',1)->get();
       // $informeables =Informeable::where('informe_id',$informe->id, ' and ', 'status','1')->get();
        $informeables =Informeable::where('informe_id',$informe->id)->get();
        return view('informe.show', compact('informe','informeables'));
    }

        public function buscar(){
        
       // 'fechaFinal' => 'required|after_or_equal:fechaInicial',
       
        
        $users  =User::where('status', 1)->pluck('name', 'id');
        $estados = Estado::where('status',1)->pluck('Descripcion','id');
        $hoy =  Carbon::now();
        $turnos =Turno::where('status',1)->pluck('Descripcion', 'id');
        return view('admin.informes.buscar', compact('users', 'turnos', 'hoy', 'estados'));


        // return $request;
        
    }

        public function imprimir(Informe $informe){
            $informeables =Informeable::where('informe_id',$informe->id)->get();
            $equipo=0;
            $pdf = PDF::loadView('admin.pdfs.nuevo', compact('informeables', 'informe', 'equipo'));
            //$pdf->loadHTML('<h1>Test</h1>');
            
            $pdf->setpaper('A4','portrait');
            $pdf->render();
            return$pdf->stream(); 
            //return $pdf->download('informes nro: '.$informe->id.'.pdf');
            //https://www.youtube.com/watch?v=w1DQIVIV09k
            //return view('admin.pdfs.reporte' , compact('informe', 'informeables', 'equipo'));
    }

}
    

    // public function imprimir(Informe $informe){
    //    $informeables =Informeable::where('informe_id',$informe->id)->get();
             
    //     $pdf= PDF::loadView('admin.pdfs.nuevo', compact('informeables', 'informe'));
    //     return $pdf->download('informe.pdf');
    // }