@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Admisiones
                    <div style="float:right;">
                        <a href="/admisiones/crear"> <button class="btn btn-primary " >Nuevo</button></a>
                    </div>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body">
                        <div class="" role="alert">
                             <table class="table">
                                 <thead>
                                     <tr>
                                        <th>Hospital</th>
                                        <th>Visita medica</th>
                                        <th>Habitacion</th>
                                        <th>Hora</th>
                                        <th>Fecha</th>
                                        <th>Opc.</th>
                                     </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($admisiones as $admision)
                                     <tr>
                                        <td>{{$admision->hospital}}</td>
                                        <td>{{$admision->pnombre.' '. $admision->papellido}}</td>
                                        <td>{{$admision->habitacion}}</td>
                                        <td>{{$admision->hora}}</td>
                                        <td>{{$admision->fecha}}</td>
                                        <td>
                                            <a href="admisiones/{{$admision->id}}"> <button class="btn btn-xs glyphicon glyphicon-user"><i class="far fa-eye"></i></button></a>
                                            <a href="/admisiones/delete/{{$admision->id}}">
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