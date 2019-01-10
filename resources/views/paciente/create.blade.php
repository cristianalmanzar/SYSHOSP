@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> Crear Pacientes</div>

                <div class="card-body">
                        <form method="POST"  action="/pacientes"> 
                            @csrf
                            <div class="row">
                                <div class="col">
                                     <label for="">Nombre:</label>
                                     <input type="text" class="form-control" placeholder="" name="nombre" required >
                                </div>
                                <div class="col">
                                     <label for="">Apellido:</label>
                                     <input type="text" class="form-control" placeholder="" name="apellido" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="">Telefono:</label>
                                    <input type="text" class="form-control" placeholder="" name="telefono" required>
                                </div>
                                <div class="col">
                                    <label for="">Cedula:</label>
                                    <input type="text" class="form-control" placeholder="" name="cedula" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col" >
                                    <label for="">Sexo:</label> <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sexo"  value="M" required>
                                        <label class="form-check-label" >
                                            Masculino
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sexo"  value="F" required>
                                        <label class="form-check-label" for="exampleRadios2">
                                            Femenino
                                        </label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="">
                                        <label for="">Direccion:</label>
                                        <input type="text" class="form-control" name="direccion" required >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                     <label for="">Ars:</label>
                                     <input type="text" class="form-control" placeholder="" name="ars" required>
                                </div>
                                <div class="col">
                                     <label for="">No. Ars:</label>
                                     <input type="text" class="form-control" placeholder="" name="ars_no" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                     <label for="">Carnet Paciente:</label>
                                     <input type="text" class="form-control" placeholder="" name="carnet_paciente" required>
                                </div>
                                
                            </div>

                            <div class="col" style="display:flex; justify-content:flex-end;" >
                                <button type="submit" class="btn btn-primary">Guardar</button>
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