@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> Crear enfermedad</div>

                <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col">
                                     <label for="">Nombre:</label>
                                     <input type="text" class="form-control" placeholder="" name="nombre" value="{{$enfermedad->nombre}}" >
                                </div>

                                <div class="col">
                                     <label for="">Detalle:</label>
                                     <input type="text" class="form-control" placeholder="" name="detalles" value="{{$enfermedad->detalles}}" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="">Tratamiento:</label>
                                    <input type="text" class="form-control" placeholder="" name="tratamiento" value="{{$enfermedad->tratamiento}}" >
                                </div>
                                
                            </div>

                           

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