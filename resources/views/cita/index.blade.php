@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Citas
                    <div style="float:right;">
                        <a href="/citas/crear"> <button class="btn btn-primary " >Nuevo</button></a>
                    </div>
                </div>

                <div class="card-body">
                        <div class="" role="alert">
                             <table class="table">
                                 <thead>
                                     <tr>
                                        <th>Medico</th>
                                        <th>Paciente</th>
                                        <th>Hora</th>
                                        <th>Fecha</th>
                                        <th>Consultorio</th>
                                        <th>Opc.</th>
                                     </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($citas as $cita)
                                     <tr>
                                        <td>{{$cita->mnombre.' '. $cita->mapellido}}</td>
                                        <td>{{$cita->pnombre.' '. $cita->papellido}}</td>
                                        <td>{{$cita->hora_cita}}</td>
                                        <td>{{$cita->fecha_cita}}</td>
                                        <td>{{$cita->consultorio}}</td>
                                        <td>
                                            <a href="citas/{{$cita->id}}"> <button class="btn btn-xs glyphicon glyphicon-user"><i class="far fa-eye"></i></button></a>
                                            <a href="/citas/delete/{{$cita->id}}">
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