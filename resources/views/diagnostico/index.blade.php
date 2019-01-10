@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Diagnosticos
                    <div style="float:right;">
                        <a href="/diagnosticos/crear"> <button class="btn btn-primary " >Nuevo</button></a>
                    </div>
                </div>

                <div class="card-body">
                        <div class="" role="alert">
                             <table class="table">
                                 <thead>
                                     <tr>
                                        <th>Enfermedad</th>
                                        <th>Medico</th>
                                        <th>Visita Medica</th>
                                        <th>Opc.</th>
                                     </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($diagnosticos as $diagnostico)
                                     <tr>
                                        <td>{{$diagnostico->nombre}}</td>
                                        <td>{{$diagnostico->mnombre.' '. $diagnostico->mapellido}}</td>
                                        <td>{{$diagnostico->visita_id}}</td>
                                        <td>
                                            <a href="diagnosticos/{{$diagnostico->id}}"> <button class="btn btn-xs glyphicon glyphicon-user"><i class="far fa-eye"></i></button></a>
                                            <a href="/diagnosticos/delete/{{$diagnostico->id}}">
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