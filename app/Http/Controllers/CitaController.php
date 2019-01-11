<?php

namespace App\Http\Controllers;

use App\Cita;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class CitaController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index()
    {
        // $citas = Cita::all();

        // return view('cita.index',[
        //     'citas' => $citas
        // ]);


        $citas = DB::table('cita')
        ->join('medico', 'cita.medico_id', '=', 'medico.id')
        ->join('paciente', 'cita.paciente_id', '=', 'paciente.id')
        ->select( 'cita.*', 'paciente.nombre as pnombre', 'paciente.apellido as papellido', 'medico.nombre as mnombre', 'medico.apellido as mapellido')
        ->get();


        // $diagnosticos = Diagnostico::all();
        // return $diagnosticos;



        return view('cita.index',[
            'citas' => $citas
        ]);

    }

    
    public function create()
    {
        $medicos   = DB::table('medico')->select("nombre", "apellido", "id")->get();
        $pacientes = DB::table('paciente')->select("nombre", "apellido","id")->get();
       

        return view('cita.create',[
            'medicos'   => $medicos,
            'pacientes' => $pacientes,

        ]);
    }

   
    public function store(Request $request)
    {
        $query  = DB::table('cita')
        ->where("medico_id",$request->medico_id)
        ->where('hora_cita',$request->hora_cita)
        ->where('fecha_cita', $request->fecha_cita)
        ->count();

        if($query > 0){
            return redirect('citas/crear')->with('status', 'Este horario no esta disponible');
        }
        
        $cita =  new Cita();
        $cita->medico_id        = $request->medico_id;
        $cita->paciente_id      = $request->paciente_id;
        $cita->hora_cita        = $request->hora_cita;
        $cita->fecha_cita       = $request->fecha_cita;
        $cita->consultorio      = $request->consultorio;
        $cita->save();

        return redirect('citas')->with('status', 'Cita guardada correctamente!');
    }

    
    public function show($id)
    {
        $cita = DB::table('cita')
            ->where('cita.id', $id)
            ->join('medico', 'cita.medico_id', '=', 'medico.id')
            ->join('paciente', 'cita.paciente_id', '=', 'paciente.id')
            ->select('cita.*', 'medico.nombre as mnombre', 'medico.apellido as mapellido', 'medico.id as medico_id', 'paciente.nombre', 'paciente.apellido', 'paciente.id as paciente_id', 'cita.hora_cita')
            ->get();



        return view('cita.show',[
            'medico'      => $cita[0]->mnombre .' '. $cita[0]->mapellido,
            'paciente'    => $cita[0]->nombre .' '. $cita[0]->apellido,
            'hora'        => $cita[0]->hora_cita, 
            'fecha'       => $cita[0]->fecha_cita,
            'consultorio' => $cita[0]->consultorio,
            'id' => $cita[0]->id,
            
        ]);
    }

    
    public function edit(Cita $cita)
    {
        //
    }

   
    public function update(Request $request)
    {
        $cita = Cita::find($request->id);
            
        $cita->hora_cita = $request->hora_cita;
        $cita->fecha_cita = $request->fecha_cita;
        $cita->consultorio = $request->consultorio;
      
        $cita->save();
            

        return redirect('citas');
    }

    
    public function destroy($id)
    {
        $cita = Cita::find($id);
        $cita->delete();

        return redirect('citas');
    }
}
