@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> Crear Medicos</div>

                <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST"  action="/medicos"> 
                            @csrf
                            <div class="row">
                                <div class="col">
                                     <label for="">Nombre:</label>
                                     <input type="text" class="form-control" placeholder="" name="nombre">
                                </div>
                                <div class="col">
                                     <label for="">Apellido:</label>
                                     <input type="text" class="form-control" placeholder="" name="apellido">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="">Telefono:</label>
                                    <input type="text" class="form-control" placeholder="" name="telefono">
                                </div>
                                <div class="col">
                                    <label for="">Cedula:</label>
                                    <input type="text" class="form-control" placeholder="" name="cedula">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col" >
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
                                </div>

                                <div class="col">
                                    <div class="">
                                        <label for="">Direccion:</label>
                                        <input type="text" class="form-control" name="direccion" >
                                    </div>
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