@extends('layouts/main')

@section('contenido')
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h2 class="text-center fw-bold fs-3">
                    <td class="icocod">&#10060;</td> Los datos a eliminar son:
                </h2>
                <br> <br>
                <a href="/" class="btn btn-info btn-block mt-3 col-12">
                    <td class="icocod">&#9194;</td> Regresar
                </a>
                <br> <br>
                
                <div class="alert alert-danger" role="alert">
                    <ul class="fs-3 mt-4 font-monospace">
                        <li>El nombre del productor: <span style="color: rgb(201, 2, 2);">{{ $items->nombre_alumno }}</span></li>
                        <li>El folio es: <span style="color: rgb(201, 2, 2);">{{ $items->numero_control }}</span></li>
                        <li>El teléfono es: <span style="color: rgb(201, 2, 2);">{{ $items->telefono }}</span></li>
                        <li>Dato: <span style="color: rgb(201, 2, 2);">{{ $items->carrera->nombre_carreras }}</span></li>
                        <li>La fecha de nacimiento: <span style="color: rgb(201, 2, 2);">{{ $items->fecha_nacimiento }}</span></li>
                        <li>Pueblo: <span style="color: rgb(201, 2, 2);">{{ $items->escuela_anterior }}</span></li>
                        <li>Fecha de registro: <span style="color: rgb(201, 2, 2);">{{ $items->fecha_ingreso }}</span></li>
                    </ul>
                </div>
                <form action="{{ route('destroy', $items->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mt-3">
                        <td class="icocod">&#10062;</td> Eliminar definitivamente
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
