@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Hospital
                    <div style="float:right;">
                        <a href="/hospitales/crear"> <button class="btn btn-primary " >Nuevo</button></a>
                    </div>
                </div>

                <div class="card-body">
                        <div class="" role="alert">
                             <table class="table">
                                 <thead>
                                     <tr>
                                        <th>Nombre</th>
                                        <th>Lugar</th>
                                        <th>Recepcion</th>
                                        <th>Opc.</th>
                                     </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($hospitales as $hospital)
                                     <tr>
                                        <td>{{$hospital->nombre}}</td>
                                        <td>{{$hospital->lugar}}</td>
                                        <td>{{$hospital->recepcion}}</td>
                                        <td>
                                            <a href="hospitales/{{$hospital->id}}"> <button class="btn btn-xs glyphicon glyphicon-user"><i class="far fa-eye"></i></button></a>
                                            <a href="/hospitales/delete/{{$hospital->id}}">
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