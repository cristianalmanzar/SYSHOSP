<?php

namespace App\Http\Controllers;

use App\Admision;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class AdmisionController extends Controller
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
        $admisiones = DB::table('admision')
        ->join('hospital', 'admision.hospital_id', '=', 'hospital.id')
        ->join('visita_medica', 'admision.visita_medica_id', '=', 'visita_medica.id')
        ->select( 'admision.id', 'visita_medica.id as visita_id', 'hospital.nombre as hospital', 'admision.habitacion', 'admision.fecha', 'admision.hora'  )
        ->get();

        return view('admision.index',[
            'admisiones' => $admisiones
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospitales   = DB::table('hospital')->select("nombre","id")->get();
        $visitas      = DB::table('visita_medica')->select('id')->get();

        return view('admision.create',[
            'hospitales'      => $hospitales,
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
        $admision =  new Admision();
        $admision->hospital_id      = $request->hospital_id;
        $admision->visita_medica_id = $request->visita_medica_id;
        $admision->habitacion       = $request->habitacion;
        $admision->hora             = $request->hora;
        $admision->fecha            = $request->fecha;
        $admision->save();
        

        return redirect('admisiones')->with('status', 'Admision guardada correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admision  $admision
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hospitales   = DB::table('hospital')->select("nombre","id")->get();
        $visitas      = DB::table('visita_medica')->select('id')->get();

        $admision = DB::table('admision')
        ->where('admision.id', $id)
        ->join('hospital', 'admision.hospital_id', '=', 'hospital.id')
        ->join('visita_medica', 'admision.visita_medica_id', '=', 'visita_medica.id')
        ->select( 'admision.id', 'visita_medica.id as visita_id', 'hospital.nombre as hospital', 'admision.hospital_id as hospital_id', 'admision.habitacion', 'admision.fecha as fecha', 'admision.hora as hora'  )
        ->get();

        return view('admision.show',[
            'admision' => $admision[0],
            'hospitales' => $hospitales,
            'visitas' => $visitas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admision  $admision
     * @return \Illuminate\Http\Response
     */
    public function edit(Admision $admision)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admision  $admision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $admison = Admision::find($request->id);
            
        $admison->hospital_id = $request->hospital_id;
        $admison->visita_medica_id = $request->visita_medica_id;
        $admison->habitacion = $request->habitacion;
        $admison->hora = $request->hora;
        $admison->fecha = $request->fecha;
        $admison->save();
            

        return redirect('admisiones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admision  $admision
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $admision = Admision::find($id);
        $admision->delete();

        return redirect('admisiones');
    }
}
