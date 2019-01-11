@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> Crear cita</div>

                <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-danger">
                                    {{ session('status') }}
                                </div>
                            @endif
                        <form method="POST"  action="/citas">
                          @csrf
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
                                    <select class="form-control" name="hora_cita">
                                        <option value="00:00">12:00 am</option>
                                        <option value="01:00">1:00 am</option>
                                        <option value="02:00">2:00 am</option>
                                        <option value="03:00">3:00 am</option>
                                        <option value="04:00">4:00 am</option>
                                        <option value="05:00">5:00 am</option>
                                        <option value="06:00">6:00 am</option>
                                        <option value="07:00">7:00 am</option>
                                        <option value="08:00">8:00 am</option>
                                        <option value="09:00">9:00 am</option>
                                        <option value="10:00">10:00 am</option>
                                        <option value="11:00">11:00 am</option>
                                        <option value="12:00">12:00 pm</option>
                                        <option value="13:00">1:00 pm</option>
                                        <option value="14:00">2:00 pm</option>
                                        <option value="15:00">3:00 pm</option>
                                        <option value="16:00">4:00 pm</option>
                                        <option value="17:00">5:00 pm</option>
                                        <option value="18:00">6:00 pm</option>
                                        <option value="19:00">7:00 pm</option>
                                        <option value="20:00">8:00 pm</option>
                                        <option value="21:00">9:00 pm</option>
                                        <option value="22:00">10:00 pm</option>
                                        <option value="23:00">11:00 pm</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="">Fecha:</label>
                                    <input type="date" name="fecha_cita" class="form-control" required>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Consultorio:</label>
                                    <input type="text" name="consultorio" class="form-control" required>
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
