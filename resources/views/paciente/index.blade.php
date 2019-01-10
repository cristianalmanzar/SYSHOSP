@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Pacientes
                     <div style="float:right;">
                        <a href="/pacientes/crear"> <button class="btn btn-primary " >Nuevo</button></a>
                    </div>
                </div>

                <div class="card-body">
                        <div class="" role="alert">
                             <table class="table">
                                 <thead>
                                     <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Telefono</th>
                                        <th>Ars</th>
                                        <th>Opc.</th>
                                     </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($pacientes as $paciente)
                                     <tr>
                                        <td>{{$paciente->nombre}}</td>
                                        <td>{{$paciente->apellido}}</td>
                                        <td>{{$paciente->telefono}}</td>
                                        <td>{{$paciente->ars}}</td>
                                        <td>
                                            <a href="pacientes/{{$paciente->id}}"> <button class="btn btn-xs glyphicon glyphicon-user"><i class="far fa-eye"></i></button></a>
                                             <a href="/pacientes/delete/{{$paciente->id}}">
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