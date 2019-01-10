@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> Ver paciente</div>

                <div class="card-body">
                       <form method="POST"  action="/pacientes/update"> 
                            @csrf
                            <div class="row">
                                <div class="col">
                                     <label for="">Nombre:</label>
                                     <input type="text" class="form-control" placeholder="" name="nombre" value="{{$paciente->nombre}}">
                                </div>
                                <div class="col">
                                     <label for="">Apellido:</label>
                                     <input type="text" class="form-control" placeholder="" name="apellido" value="{{$paciente->apellido}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="">Telefono:</label>
                                    <input type="text" class="form-control" placeholder="" name="telefono" value="{{$paciente->telefono}}">
                                </div>
                                <div class="col">
                                    <label for="">Cedula:</label>
                                    <input type="text" class="form-control" placeholder="" name="cedula" value="{{$paciente->cedula}}">
                                </div>
                            </div>

                            <div class="row">
                                {{--  <div class="col" >  --}}
                                    {{--  <label for="">Sexo:</label> <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sexo"  value="M">
                                        <label class="form-check-label" >
                                            Masculino
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sexo"  value="F">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Femenino
                                        </label>
                                    </div>  --}}
                                {{--  </div>  --}}

                                <div class="col">
                                    <div class="">
                                        <label for="">Direccion:</label>
                                        <input type="text" class="form-control" name="direccion" value="{{$paciente->direccion}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                     <label for="">Ars:</label>
                                     <input type="text" class="form-control" placeholder="" name="ars" value="{{$paciente->ars}}">
                                </div>
                                <div class="col">
                                     <label for="">No. Ars:</label>
                                     <input type="text" class="form-control" placeholder="" name="ars_no" value="{{$paciente->ars_no}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                     <label for="">Carnet Paciente:</label>
                                     <input type="text" class="form-control" placeholder="" name="carnet_paciente" value="{{$paciente->carnet_paciente}}">
                                </div>
                                
                            </div>
                            <input type="hidden" name="id" value="{{$paciente->id}}">
                            <div class="col" style="display:flex; justify-content:flex-end;" >
                                <button class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .col{
        margin-bottom: 10px;
    }
</style>
@endsection