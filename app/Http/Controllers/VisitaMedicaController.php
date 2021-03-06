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
        $citas    = DB::table('cita')
        ->join('paciente','cita.paciente_id', '=', 'paciente.id')
        ->select("cita.id",'cita.fecha_cita','paciente.nombre')->get();



        return view('visita_medica.create',[
            'medicos'    => $medicos,
            'pacientes'  => $pacientes,
            'hospitales' => $hospitales,
            'citas'      => $citas,

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
        $query  = DB::table('visita_medica')
        ->where("medico_id",$request->medico_id)
        ->where('hora',$request->hora)
        ->where('fecha',$request->fecha)
        ->count();
        if($query > 0){
            return redirect('visitas/crear')->with('status', 'Este horario no esta disponible');
        }

        $visita =  new VisitaMedica();
        $visita->hospital_id      = $request->hospital_id;
        $visita->medico_id        = $request->medico_id;
        $visita->paciente_id      = $request->paciente_id;
        $visita->hora             = $request->hora;
        $visita->fecha            = $request->fecha;
        $visita->cita_id          = $request->cita_id;
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
            ->join('cita','visita_medica.cita_id','=','cita.id')
            ->select('visita_medica.*', 'medico.nombre as mnombre', 'medico.apellido as mapellido', 'medico.id as medico_id', 'paciente.nombre', 'paciente.apellido', 'paciente.id as paciente_id', 'hospital.nombre as hospital','cita.id as cid','cita.fecha_cita as fecha_cita')
            ->get();



        return view('visita_medica.show',[
            'medico'      => $visita[0]->mnombre .' '. $visita[0]->mapellido,
            'paciente'    => $visita[0]->nombre .' '. $visita[0]->apellido,
            'hora'        => $visita[0]->hora, 
            'fecha'       => $visita[0]->fecha,
            'hospital'    => $visita[0]->hospital,
            'id'          => $visita[0]->id,
            'fecha_cita'  => $visita[0]->fecha_cita,
            'c_id'        => $visita[0]->cid

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
    public function update(Request $request)
    {
        $visita = VisitaMedica::find($request->id);
        $visita->fecha = $request->fecha;
        $visita->hora  = $request->hora;
        $visita->save();
        return redirect('visitas');
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
