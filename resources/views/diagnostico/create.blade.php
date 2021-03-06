@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> Crear diagnostico</div>

                <div class="card-body">
                        <form method="POST"  action="/diagnosticos">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Enfermedad:</label>
                                      <select class="form-control" name="enfermedad_id" >
                                        @foreach($enfermedades as $enfermedad )
                                            <option  value="{{$enfermedad->id}}">{{$enfermedad->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-md-6">
                                    <label for="">Medico:</label>
                                      <select class="form-control" name="medico_id" >
                                        @foreach($medicos as $medico )
                                            <option  value="{{$medico->id}}">{{$medico->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                     <label for=""> Visita Medica:</label>
                                     <select class="form-control" name="visita_medica_id" >
                                        @foreach($visitas as $visita )
                                            <option  value="{{$visita->id}}">{{$visita->id}}</option>
                                        @endforeach
                                    </select>
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
