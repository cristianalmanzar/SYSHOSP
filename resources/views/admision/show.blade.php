@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> Ver admision</div>

                <div class="card-body">
                        <form method="POST"  action="/admisiones/update"> 
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Hospital:</label>
                                      <select class="form-control hospital" id="hospital" name="hospital_id" val="{{$admision->hospital_id}}" >
                                        @foreach($hospitales as $hospital )
                                            <option  value="{{$hospital->id}}">{{$hospital->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                     <label for="">Visita Medica:</label>
                                     <select class="form-control" name="visita_medica_id" id="visita"  val="{{$admision->visita_id}}">
                                        @foreach($visitas as $visita )
                                            <option  value="{{$visita->id}}">{{$admision->pnombre.' '. $admision->papellido }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col">
                                     <label for="">Habitacion:</label>
                                      <input type="number" name="habitacion" class="form-control" value="{{$admision->habitacion}}"required >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="">Hora:</label>
                                    <input type="text" class="form-control" name="hora" value="{{$admision->hora}}" readonly>
                                </div>

                                <div class="col">
                                    <label for="">Fecha:</label>
                                    <input type="date" name="fecha" class="form-control" value="{{$admision->fecha}}"  required>
                                </div>
                                
                            </div>
                            
                            <input type="hidden" name="id" value="{{$admision->id}}">
                            

                           

                            <div class="col" style="display:flex; justify-content:flex-end;" >
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        var hospital = $('#hospital').attr('val');
        $('#hospital').find('option[value='+hospital+ ']').prop('selected', true);

         var visita = $('#visita').attr('val');
        $('#visita').find('option[value='+visita+ ']').prop('selected', true);

        var hora = $('#hora').attr('val');
        $('#hora').find('option[value='+''+hora + ''+ ']').prop('selected', true);

        
    });
</script>
<style>
    .col{
        margin-bottom: 10px;
    }
</style>
@endsection
