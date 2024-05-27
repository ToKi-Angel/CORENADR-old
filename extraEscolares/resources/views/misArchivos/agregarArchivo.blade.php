@extends('layouts/main')

@section('contenido')
    <p class="fs-2 text-center mt-4">
        <img src="{{ asset('img/LOGOTEC.png') }}" alt="Icono" style="width: 54px; height: auto;">
        Agregar archivo
    </p>
    <a href="/" class="btn btn-info btn-block mt-3 col-12">
        <td class="icocod">&#9194;</td> Regresar
    </a>

    <div class="mt-4 fs-4">
        <ul class="alert alert-primary" role="alert" >
            <li>El nombre del productor: <span style="color: rgb(201, 2, 2);">{{ $items->nombre_alumno }}</span></li>
            <li>El folio es: <span style="color: rgb(201, 2, 2);">{{ $items->numero_control }}</span></li>
            <li>Dato: <span style="color: rgb(201, 2, 2);">{{ $items->carrera->nombre_carreras }}</span></li>
        </ul>
    </div>
    
    <form class="row g-3 mt-4 fs-4" enctype="multipart/form-data" action="{{ route('updateArchivo', ['id' => $items->id,'credito'=>$credito ?? '']) }}" method="POST">
        @csrf
        @method('PUT')
        

        <div class="col-md-6 mt-4">
            <label  for="exampleInputEmail1" >Numero</label>
            <input type="number" class="form-control" id="nombre_evento" name="nombre_evento"  aria-describedby="emailHelp" placeholder="Numero">
        </div>

        <div class="col-md-6 mt-4">
            <div class="row">
                <div class="col-md-12">
                    <label for="credito" class="form-label">Dato:</label>
                    <select id="credito" name="credito" class="form-control" required>
                        <option value="">Dato</option>
                        @foreach (['dato1', 'dato2', 'dato3'] as $tipo)
                            <option value="{{ $tipo }}" {{ $credito ?? '' === $tipo ? 'selected' : '' }}>
                                {{ $tipo }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-4">
            <label for="formFile" class="form-label">Evidencias</label>
            <input class="form-control" type="file" id="evidencias_constancias" name="evidencias_constancias" accept=".pdf">
        </div>

        <div class="col-md-6 mt-4">
            <div class="row">
                <div class="col-md-12">
                    <label for="formFile" class="form-label">PDF</label>
                    <input class="form-control" type="file" id="mooc" name="mooc" accept=".pdf">
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <label for="inputCity" class="form-label">Nota</label>
            <textarea class="form-control" id="ubicacion_fisica" name="ubicacion_fisica" required></textarea>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
@endsection
