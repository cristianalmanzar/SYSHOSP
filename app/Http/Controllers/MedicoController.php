<?php

namespace App\Http\Controllers;

use App\Medico;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class MedicoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $medicos = Medico::all(); 
        return view('medico.index',[
            'medicos' => $medicos
        ]);
    }

    public function create()
    {   
        return view('medico.create');    
    }


    public function store(Request $request)
    {
        $query  = DB::table('medico')->where("cedula",$request->cedula)->count();

        if($query > 0){
            return redirect('medicos/crear')->with('status', 'Esta cedula ya esta registrada');
        }
        $medico =  new Medico();
        $medico->nombre           = $request->nombre;
        $medico->apellido = $request->apellido;
        $medico->telefono       = $request->telefono;
        $medico->cedula             = $request->cedula;
        $medico->sexo            = $request->sexo;
        $medico->direccion            = $request->direccion;
        $medico->save();
        

        return redirect('medicos')->with('status', 'Medico guardada correctamente!');
        return $request;
    }


    public function show($id)
    {
        $medico = Medico::find($id);
        return view('medico.show',[
            'medico' => $medico
        ]);
    }


    public function edit(Medico $medico)
    {
        //
    }


    public function update(Request $request)
    {
        $medico = Medico::find($request->id);
        $medico->nombre   = $request->nombre;    
        $medico->apellido = $request->apellido;    
        $medico->telefono = $request->telefono;    
        $medico->cedula   = $request->cedula;    
        $medico->direccion = $request->direccion;    
      
        $medico->save();
            

        return redirect('medicos');
    }


    public function destroy( $id)
    {
        $medico = Medico::find($id);
        $medico->delete();

        return redirect('medicos');
    }
}
