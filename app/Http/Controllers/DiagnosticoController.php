<?php

namespace App\Http\Controllers;

use App\Diagnostico;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;


class DiagnosticoController extends Controller
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
        $diagnosticos = DB::table('diagnostico')
        ->join('medico', 'diagnostico.medico_id', '=', 'medico.id')
        ->join('visita_medica', 'diagnostico.visita_medica_id', '=', 'visita_medica.id')
        ->join('enfermedad','diagnostico.enfermedad_id', '=', 'enfermedad.id')
        ->select( 'diagnostico.id','medico.nombre as mnombre', 'medico.apellido as mapellido', 'medico.id as medico_id ', 'visita_medica.id as visita_id', 'enfermedad.nombre as enfermedad', 'enfermedad.id  as enfermedad_id')
        ->get();

        // $diagnosticos = Diagnostico::all();


        // $diagnosticos = Diagnostico::all();
        // return $diagnosticos;



        return view('diagnostico.index',[
            'diagnosticos' => $diagnosticos
        ]);

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos      = DB::table('medico')->select("nombre", "apellido", "id")->get();
        $enfermedades = DB::table('enfermedad')->select("nombre","id")->get();
        $visitas      = DB::table('visita_medica')->select('id')->get();

        return view('diagnostico.create',[
            'enfermedades' => $enfermedades,
            'medicos'      => $medicos,
            'visitas'      => $visitas 
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
      

      $diagnostico =  new Diagnostico();
      $diagnostico->medico_id        = $request->medico_id;
      $diagnostico->visita_medica_id = $request->visita_medica_id;
      $diagnostico->enfermedad_id    = $request->enfermedad_id;
      $diagnostico->save();

      return redirect('diagnosticos')->with('status', 'Diagnostico guardado correctamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $medicos      = DB::table('medico')->select("nombre", "apellido", "id")->get();
        $enfermedades = DB::table('enfermedad')->select("nombre","id")->get();
        $visitas      = DB::table('visita_medica')->select('id')->get();

        $diagnostico = DB::table('diagnostico')
        ->where('diagnostico.id',$id)
        ->join('medico', 'diagnostico.medico_id', '=', 'medico.id')
        ->join('visita_medica', 'diagnostico.visita_medica_id', '=', 'visita_medica.id')
        ->join('enfermedad','diagnostico.enfermedad_id', '=', 'enfermedad.id')
        ->select( 'diagnostico.id','diagnostico.medico_id','medico.nombre as mnombre', 'medico.apellido as mapellido', 'medico.id as medico_id ', 'visita_medica.id as visita_id', 'enfermedad.nombre as enfermedad', 'enfermedad.id  as enfermedad_id')
        ->get();

        return view('diagnostico.show',[
            'diagnostico' => $diagnostico[0],
            'enfermedades' => $enfermedades,
            'medicos'      => $medicos,
            'visitas'      => $visitas 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnostico $diagnostico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $diagnostico = Diagnostico::find($request->id);
        $diagnostico->enfermedad_id    = $request->enfermedad_id;
        $diagnostico->medico_id        = $request->medico_id;
        $diagnostico->visita_medica_id = $request->visita_medica_id;
        $diagnostico->save();
        return redirect('diagnosticos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diagnostico = Diagnostico::find($id);
        $diagnostico->delete();

        return redirect('diagnosticos');
    }
}
