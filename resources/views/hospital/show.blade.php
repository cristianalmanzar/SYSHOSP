@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> Mostrar hospital</div>

                <div class="card-body">
                        <form method="POST"  action="/hospitales/update"> 
                            @csrf
                            <div class="row">
                                <div class="col">
                                     <label for="">Nombre:</label>
                                     <input type="text" class="form-control" placeholder="" name="nombre" value="{{$hospital->nombre}}">
                                </div>

                                <div class="col">
                                     <label for="">Lugar:</label>
                                     <input type="text" class="form-control" placeholder="" name="lugar" value="{{$hospital->lugar}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="">Recepcion:</label>
                                    <input type="text" class="form-control" placeholder="" name="recepcion" value="{{$hospital->recepcion}}">
                                </div>
                                
                            </div>

                           
                            <input type="hidden" name="id" value="{{$hospital->id}}">
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