@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> Ver visita medica</div>

                <div class="card-body">
                         <form method="POST"  action="/visitas/update"> 
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Consultorio:</label>
                                    <input type="text" name="hospital_id" class="form-control" value="{{$hospital}}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                     <label for="">Medico:</label>
                                     <input type="text" name="medico_id" class="form-control" value="{{$medico}}" readonly>
                                </div>

                                <div class="col">
                                     <label for="">Paciente:</label>
                                     <input type="text" name="paciente" class="form-control" value="{{$paciente}}" readonly>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="">Hora:</label>
                                    <select class="form-control" name="hora" value="{{$hora}}">
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
                                    <input type="date" name="fecha" class="form-control" value="{{$fecha}}">
                                </div>
                                
                            </div>

                          
                            <input type="hidden" name="id" value="{{$id}}">

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
