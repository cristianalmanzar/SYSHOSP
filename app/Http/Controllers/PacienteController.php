<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $pacientes = Paciente::all();
        return view('paciente.index',[
            "pacientes" => $pacientes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paciente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $paciente =  new Paciente();
        $paciente->nombre                     = $request->nombre;
        $paciente->apellido                   = $request->apellido;
        $paciente->telefono                   = $request->telefono;
        $paciente->cedula                     = $request->cedula;
        $paciente->sexo                       = $request->sexo;
        $paciente->direccion                  = $request->direccion;
        $paciente->ars                        = $request->ars;
        $paciente->ars_no                     = $request->ars_no;
        $paciente->carnet_paciente            = $request->carnet_paciente;
        $paciente->save();
        

        return redirect('pacientes')->with('status', 'Paciente guardado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $id)
    {
        $paciente = Paciente::find($id);
        // return $paciente;
        return view('paciente.show',[
            'paciente' => $paciente[0]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $paciente = Paciente::find($request->id);
        $paciente->nombre = $request->nombre;
        $paciente->apellido = $request->apellido;
        $paciente->telefono = $request->telefono;
        $paciente->cedula = $request->cedula;
        $paciente->direccion = $request->direccion;
        $paciente->ars = $request->ars;
        $paciente->ars_no = $request->ars_no;
        $paciente->carnet_paciente = $request->carnet_paciente;
        $paciente->save();

        return redirect('pacientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        $paciente->delete();

        return redirect('pacientes');
    }
}
