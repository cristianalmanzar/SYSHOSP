@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> Mostrar Medicos</div>

                <div class="card-body">
                        <form method="POST"  action="/medicos/update"> 
                            @csrf
                            <div class="row">
                                <div class="col">
                                     <label for="">Nombre:</label>
                                     <input type="text" class="form-control" placeholder="" name="nombre" value="{{$medico->nombre}}">
                                </div>

                                <div class="col">
                                     <label for="">Apellido:</label>
                                     <input type="text" class="form-control" placeholder="" name="apellido" value="{{$medico->apellido}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="">Telefono:</label>
                                    <input type="text" class="form-control" placeholder="" name="telefono" value="{{$medico->telefono}}">
                                </div>
                                <div class="col">
                                    <label for="">Cedula:</label>
                                    <input type="text" class="form-control" placeholder="" name="cedula" value="{{$medico->cedula}}">
                                </div>
                            </div>

                            <div class="row">
                                {{--  <div class="col" >
                                    <label for="">Sexo:</label> <br>
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
                                    </div>
                                </div>  --}}

                                <div class="col">
                                    <div class="">
                                        <label for="">Direccion:</label>
                                        <input type="text" class="form-control" name="direccion" value="{{$medico->direccion}}" >
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{$medico->id}}">
                            <div class="col" style="display:flex; justify-content:flex-end;" >
                                <button class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
    });
</script>
<style>
    .col{
        margin-bottom: 10px;
    }
</style>
@endsection