@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> Crear cita</div>

                <div class="card-body">
                         <form method="POST"  action="/visitas"> 
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Hospital:</label>
                                      <select class="form-control" name="hospital_id">
                                        @foreach($hospitales as $hospital )
                                            <option  value="{{$hospital->id}}">{{$hospital->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                     <label for="">Medico:</label>
                                     <select class="form-control" name="medico_id">
                                        @foreach($medicos as $medico )
                                            <option  value="{{$medico->id}}">{{$medico->nombre .' '. $medico->apellido}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col">
                                     <label for="">Paciente:</label>
                                      <select class="form-control" name="paciente_id">
                                        @foreach($pacientes as $paciente )
                                            <option  value="{{$paciente->id}}">{{$paciente->nombre .' '. $paciente->apellido}}</option>
                                        @endforeach
                                     </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="">Hora:</label>
                                    <select class="form-control" name="hora">
                                        <option value="0">12:00 am</option>
                                        <option value="1">1:00 am</option>
                                        <option value="2">2:00 am</option>
                                        <option value="3">3:00 am</option>
                                        <option value="4">4:00 am</option>
                                        <option value="5">5:00 am</option>
                                        <option value="6">6:00 am</option>
                                        <option value="7">7:00 am</option>
                                        <option value="8">8:00 am</option>
                                        <option value="9">9:00 am</option>
                                        <option value="10">10:00 am</option>
                                        <option value="11">11:00 am</option>
                                        <option value="12">12:00 pm</option>
                                        <option value="13">1:00 pm</option>
                                        <option value="14">2:00 pm</option>
                                        <option value="15">3:00 pm</option>
                                        <option value="16">4:00 pm</option>
                                        <option value="17">5:00 pm</option>
                                        <option value="18">6:00 pm</option>
                                        <option value="19">7:00 pm</option>
                                        <option value="20">8:00 pm</option>
                                        <option value="21">9:00 pm</option>
                                        <option value="22">10:00 pm</option>
                                        <option value="23">11:00 pm</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="">Fecha:</label>
                                    <input type="date" name="fecha" class="form-control">
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
