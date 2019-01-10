@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Visitas medicas
                     <div style="float:right;">
                        <a href="/visitas/crear"> <button class="btn btn-primary " >Nuevo</button></a>
                    </div>
                </div>

                <div class="card-body">
                        <div class="" role="alert">
                             <table class="table">
                                 <thead>
                                     <tr>
                                        <th>Hospital</th>
                                        <th>Medico</th>
                                        <th>Paciente</th>
                                        <th>Hora</th>
                                        <th>Fecha</th>
                                        <th>Opc.</th>
                                     </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($visitas as $visita)
                                     <tr>
                                        <td>{{$visita->hospital}}</td>
                                        <td>{{$visita->medicon .' '. $visita->medicoa}}</td>
                                        <td>{{$visita->paciente}}</td>
                                        <td>{{$visita->hora}}</td>
                                        <td>{{$visita->fecha}}</td>
                                        <td>
                                            <a href="visitas/{{$visita->id}}"> <button class="btn btn-xs glyphicon glyphicon-user"><i class="far fa-eye"></i></button></a>
                                            <a href="/visitas/delete/{{$visita->id}}">
                                                <button class="btn btn-xs" name="id" ><i class="fas fa-trash-alt"></i></button>
                                            </a>
                                        </td>
                                     </tr>
                                    @endforeach
                                 </tbody>
                             </table>
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection