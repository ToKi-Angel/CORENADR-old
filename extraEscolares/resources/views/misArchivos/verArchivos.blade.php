@extends('layouts/main')

@section('contenido')
    <div class="container">
        <div class="row">
            <a href="/misArchivos/tabla" class="btn btn-info btn-block mt-3 col-12">
                <td class="icocod">&#9194;</td> Regresar
            </a>
            <div class="col-md-6">
                <br>
                <h2 class="alert alert-primary text-center" role="alert" >Moocs Civicos</h2>
                @if ($existeMoocCivico)
                    <iframe src="{{ asset($moocCivicapdf) }}" width="100%" height="300px"></iframe>
                    <button class="btn btn-danger eliminar-archivo"
                                    data-ruta="{{ $moocCivicapdf }}">Eliminar</button>
                @else
                    <p class="alert alert-warning d-flex align-items-center" role="alert" >No existe el archivo Mooc Cívico.
                        <a href="{{ route('datos_A', $items->id) }}" class="btn btn-success">Subir archivos</a>
                    </p>
                    
                @endif
            </div>
            <div class="col-md-6">
                <br>
                <h2 class="alert alert-primary text-center" role="alert">Evidencias Civicas</h2>
                @if ($existeEvidenciasCivicas)
                    <iframe src="{{ asset($evidenciaCivicapdf) }}" width="100%" height="300px"></iframe>
                    <button class="btn btn-danger eliminar-archivo"
                                    data-ruta="{{ $evidenciaCivicapdf }}">Eliminar</button>
                @else
                    <p class="alert alert-warning d-flex align-items-center" role="alert">No existe el archivo Evidencia Cívica.
                        <a href="{{ route('datos_A', $items->id) }}" class="btn btn-success">Subir archivos</a>
                    </p>
                    
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2 class="alert alert-primary text-center" role="alert" >Moocs Deportivos</h2>
                @if ($existeMoocDeportivas)
                    <iframe src="{{ asset($moocDeportivaspdf) }}" width="100%" height="300px"></iframe>
                    <button class="btn btn-danger eliminar-archivo"
                                    data-ruta="{{ $moocDeportivaspdf }}">Eliminar</button>
                @else
                    <p class="alert alert-warning d-flex align-items-center" role="alert" >No existe el archivo Mooc Deportivos.
                        <a href="{{ route('datos_A', $items->id) }}" class="btn btn-success">Subir archivos</a>
                    </p>
                    
                @endif
            </div>
            <div class="col-md-6">
                <h2 class="alert alert-primary text-center" role="alert" >Evidencias Deportivas</h2>
                @if ($existeEvidenciasDeportivas)
                    <iframe src="{{ asset($evidenciaDeportivaspdf) }}" width="100%" height="300px"></iframe>
                    <button class="btn btn-danger eliminar-archivo"
                                    data-ruta="{{ $evidenciaDeportivaspdf }}">Eliminar</button>
                    
                @else
                    <p class="alert alert-warning d-flex align-items-center" role="alert" >No existe el archivo Evidencia Deportiva.
                        <a href="{{ route('datos_A', $items->id) }}" class="btn btn-success">Subir archivos</a>
                    </p>
                    
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2 class="alert alert-primary text-center" role="alert" >Moccs Culturales</h2>
                @if ($existeMoocCulturales)
                    <iframe src="{{ asset($moocCulturalespdf) }}" width="100%" height="300px"></iframe>
                    <button class="btn btn-danger eliminar-archivo"
                                    data-ruta="{{ $moocCulturalespdf }}">Eliminar</button>
                @else
                    <p class="alert alert-warning d-flex align-items-center" role="alert" >No existe el archvo Mooc Culturales.
                        <a href="{{ route('datos_A', $items->id) }}" class="btn btn-success">Subir archivos</a>
                    </p>
                    
                @endif
            </div>
            <div class="col-md-6">
                <h2 class="alert alert-primary text-center" role="alert" >Evidencias Culturales</h2>
                @if ($existeEvidenciasCulturales)
                    <iframe src="{{ asset($evidenciaCulturalespdf) }}" width="100%" height="300px"></iframe>
                    <button class="btn btn-danger eliminar-archivo"
                                    data-ruta="{{ $evidenciaCulturalespdf }}">Eliminar</button>
                @else
                    <p class="alert alert-warning d-flex align-items-center" role="alert" >No existe el archvo Evidencia Culturales.
                        <a href="{{ route('datos_A', $items->id) }}" class="btn btn-success">Subir archivos</a>
                    </p>
                    
                @endif
            </div>
        </div>
    </div>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            // Eliminar archivo
            $('.eliminar-archivo').on('click', function() {
                var ruta = $(this).data('ruta');
    
                swal({
                    title: "¿Estás seguro de eliminar el archivo?",
                    text: "Esta acción no se puede deshacer",
                    icon: "warning",
                    buttons: ["Cancelar", "Eliminar"],
                    dangerMode: true,
                }).then(function(confirm) {
                    if (confirm) {
                        eliminarArchivo(ruta);
                    }
                });
            });
    
            function eliminarArchivo(ruta) {
                $.ajax({
                    url: '/eliminar-archivo',
                    type: 'POST',
                    data: {
                        ruta: ruta
                    },
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        swal('Éxito', response.message, 'success').then(function() {
                            window.location.href = window.location.href; // Redirigir a la misma página
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        swal('Error', 'Ocurrió un error al eliminar el archivo.', 'error');
                    }
                });
            }
        });
    </script>
@endsection
