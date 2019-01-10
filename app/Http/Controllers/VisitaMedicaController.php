<?php

namespace App\Http\Controllers;

use App\VisitaMedica;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class VisitaMedicaController extends Controller
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
        // $visitas = VisitaMedica::all();
        // return view('visita_medica.index', [
        //     'visitas' => $visitas
        // ]);


        $visitas = DB::table('visita_medica')
        ->join('hospital', 'visita_medica.hospital_id', '=', 'hospital.id')
        ->join('medico','visita_medica.medico_id', '=', 'medico.id')
        ->join('paciente','visita_medica.paciente_id', '=', 'paciente.id')
        ->select( 'visita_medica.*', 'hospital.nombre as hospital', 'paciente.nombre as paciente', 'medico.nombre as medicon', 'medico.apellido as medicoa'   )
        ->get();

        return view('visita_medica.index',[
            'visitas' => $visitas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos    = DB::table('medico')->select("nombre", "apellido", "id")->get();
        $pacientes  = DB::table('paciente')->select("nombre", "apellido","id")->get();
        $hospitales = DB::table('hospital')->select("nombre","id")->get();


        return view('visita_medica.create',[
            'medicos'    => $medicos,
            'pacientes'  => $pacientes,
            'hospitales' => $hospitales

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $visita =  new VisitaMedica();
        $visita->hospital_id      = $request->hospital_id;
        $visita->medico_id        = $request->medico_id;
        $visita->paciente_id      = $request->paciente_id;
        $visita->hora             = $request->hora;
        $visita->fecha            = $request->fecha;
        $visita->save();
        

        return redirect('visitas')->with('status', 'Visita guardada correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VisitaMedica  $visitaMedica
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visita = DB::table('visita_medica')
            ->where('visita_medica.id', $id)
            ->join('medico', 'visita_medica.medico_id', '=', 'medico.id')
            ->join('paciente', 'visita_medica.paciente_id', '=', 'paciente.id')
            ->join('hospital', 'visita_medica.hospital_id', '=', 'hospital.id')
            ->select('visita_medica.*', 'medico.nombre as mnombre', 'medico.apellido as mapellido', 'medico.id', 'paciente.nombre', 'paciente.apellido', 'paciente.id', 'hospital.nombre as hospital')
            ->get();



        return view('visita_medica.show',[
            'medico'      => $visita[0]->mnombre .' '. $visita[0]->mapellido,
            'paciente'    => $visita[0]->nombre .' '. $visita[0]->apellido,
            'hora'        => $visita[0]->hora, 
            'fecha'       => $visita[0]->fecha,
            'hospital' => $visita[0]->hospital
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VisitaMedica  $visitaMedica
     * @return \Illuminate\Http\Response
     */
    public function edit(VisitaMedica $visitaMedica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VisitaMedica  $visitaMedica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VisitaMedica $visitaMedica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VisitaMedica  $visitaMedica
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $visita = VisitaMedica::find($id);
        $visita->delete();

        return redirect('visitas');
    }
}
