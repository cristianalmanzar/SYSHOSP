<?php

namespace App\Http\Controllers;

use App\Medico;
use Illuminate\Http\Request;

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


    public function show(Medico $id)
    {
        $medico = Medico::find($id);
        return view('medico.show',[
            'medico' => $medico[0]
        ]);
    }


    public function edit(Medico $medico)
    {
        //
    }


    public function update(Request $request, Medico $medico)
    {
        //
    }


    public function destroy( $id)
    {
        $medico = Medico::find($id);
        $medico->delete();

        return redirect('medicos');
    }
}
