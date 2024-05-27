@extends('layouts/main')
@section('contenido')
<style>
    form .form-control {
  font-size: 20px; /* Tamaño de fuente más grande */
  
    }

</style>
<br>
<br>
<form action="{{ route('reporteHoras') }}" method="POST" >
    @csrf
    <input type="hidden" name="id" value="{{ $id }}">

    <div class="form-row">
     
    <div class="form-group">
      <label for="inputAddress" class="alert alert-primary" role="alert" >Nombre del evento </label>
      <input type="text" class="form-control" id="inputAddress" name="evento" placeholder="Evento...">
    </div>
    <br>
    <div class="form-group">
      <label for="inputAddress2" class="alert alert-primary" role="alert" >Horas Liberadas</label>
      <input type="number" class="form-control" id="inputAddress2" name="horas" placeholder="...">
    </div>
        <br>
      <div class="form-group col-md-4">
        <label for="inputState" class="alert alert-primary" role="alert" >Creditos</label>
        <select id="inputState" name="tipo_credito" class="form-control">
          <option selected>Cultural </option>
          <option>Deportivo</option>
          <option>Cívico</option>
        </select>
      </div>
      <br>
    <button class="btn btn-success">Generar</button>
  </form>
    
@endsection