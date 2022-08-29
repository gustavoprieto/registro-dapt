<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadosController extends Controller
{
        public function __construct(){

      $this->middleware('can:admin.estados.index')->only('index');
      $this->middleware('can:admin.estados.create')->only('create','store');
      $this->middleware('can:admin.estados.edit')->only('edit','update');
      $this->middleware('can:admin.estados.destroy')->only('destroy');
    }
    
       
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estado::where('status','1')->get();
        return view('admin.estados.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.estados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    //    return $request;
        $request->validate([
        'Descripcion' => 'required',
        'valor'=>'required'
        ]);
        //return $request->all();
        $estado = Estado::create($request->all());
        return redirect()->route('admin.estados.index',$estado)->with('crear', 'si');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Estado $estado)
    // {
    //    return view('admin.estados.show', compact('estado'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Estado $estado)
    {
        return view('admin.estados.edit', compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estado $estado)
    {
        $request->validate([
            'Descripcion' => 'required',
            'valor' => 'required'
        ]);
        $estado->update($request->all());

        return redirect()->route('admin.estados.index',$estado)->with('actualiza', 'si');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado $estado)
    {
       $estadoborra = DB::table('estados')
                        ->where('id',$estado->id)
                        ->update(['status'=>2]);
        return redirect()->route('admin.estados.index')->with('eliminar', 'ok');
    }
}