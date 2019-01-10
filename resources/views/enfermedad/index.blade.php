@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Enfermad
                
                    <div style="float:right;">
                        <a href="/enfermedades/crear"> <button class="btn btn-primary " >Nuevo</button></a>
                    </div>
                </div>

                <div class="card-body">
                        <div class="" role="alert">
                             <table class="table">
                                 <thead>
                                     <tr>
                                        <th>Nombre</th>
                                        <th>Detalle</th>
                                        <th>Tratamiento</th>
                                        <th>Opc.</th>
                                     </tr>
                                 </thead>

                                 <tbody>
                                    @foreach($enfermedades as $enfermedad)
                                     <tr>
                                        <td>{{$enfermedad->nombre}}</td>
                                        <td>{{$enfermedad->detalles}}</td>
                                        <td>{{substr($enfermedad->tratamiento,0,35)}}</td>
                                        <td>
                                            <a href="enfermedades/{{$enfermedad->id}}"> <button class="btn btn-xs glyphicon glyphicon-user"><i class="far fa-eye"></i></button></a>
                                             <a href="/enfermedades/delete/{{$enfermedad->id}}">
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