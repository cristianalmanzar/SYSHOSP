@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Medicos
                
                 <div style="float:right;">
                        <a href="/medicos/crear"> <button class="btn btn-primary " >Nuevo</button></a>
                    </div></div>

                <div class="card-body">
                        <div class="" role="alert">
                             <table class="table">
                                 <thead>
                                     <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Telefono</th>
                                        <th>Cedula</th>
                                        <th>Opc.</th>
                                     </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($medicos as $medico)
                                     <tr>
                                        <td>{{$medico->nombre}}</td>
                                        <td>{{$medico->apellido}}</td>
                                        <td>{{$medico->telefono}}</td>
                                        <td>{{$medico->telefono}}</td>
                                        <td>
                                            <a href="medicos/{{$medico->id}}"> <button class="btn btn-xs glyphicon glyphicon-user"><i class="far fa-eye"></i></button></a>
                                            <a href="/medicos/delete/{{$medico->id}}">
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