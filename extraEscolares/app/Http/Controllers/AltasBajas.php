<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use App\Models\Carreras;
use App\Models\Creditos;
use App\Models\Archivo;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class AltasBajas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'Cache'])->only(['index', 'tabla', 'create', 'edit','eliminar','agregarArchivo','editarArchivos','verArchivos','constancia-civica'
                                                    , 'constancia-cultural', 'constancia-deportiva','creditos_Explicacion','empresa','registrarUsuario','reporte','reporteHoras']);
    }

    public function index()
    {
        $titulo = 'Inicio';
        $items = Alumnos::all();
        $carrera = Carreras::all();
        return view('/crud/index', compact('titulo', 'items'))->with('carrera', $carrera);
    }

    public function tabla()
    {
        $titulo = 'Información';
        $items = Alumnos::all();
        return view("misArchivos.tabla", compact('titulo', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = 'Agregar';
        $carrera = Carreras::all();
        return view('/crud/create', compact('titulo'))->with('carrera', $carrera);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ini_set('post_max_size', '16M');

        $item = new Alumnos();
        $item->nombre_alumno = $request->nombre_alumno;
        $item->numero_control = $request->numero_control;
        $item->telefono = $request->telefono;
        $item->id_carrera = $request->carrera; // Asignar el ID de la carrera seleccionada
        $item->fecha_nacimiento = $request->fecha_nacimiento;
        $item->escuela_anterior = $request->escuela_anterior;
        $item->fecha_ingreso = $request->fecha_ingreso;

        // Obtener el tipo de crédito seleccionado
        $credito = $request->credito;

        // Obtener el evento o taller y la ubicación física
        $eventoTaller = $request->nombre_evento;
        $ubicacionFisica = $request->ubicacion_fisica;

        // Guardar el evento o taller y la ubicación física en las columnas correspondientes según el tipo de crédito
        if ($credito === 'Cultural') {
            $item->eventoTallerCultural = $eventoTaller;
            $item->ubicacionFisicaCultural = $ubicacionFisica;
        } elseif ($credito === 'Deportivo') {
            $item->eventoTallerDeportiva = $eventoTaller;
            $item->ubicacionFisicaDeportiva = $ubicacionFisica;
        } elseif ($credito === 'Civico') {
            $item->eventoTallerCivico = $eventoTaller;
            $item->ubicacionFisicaCivica = $ubicacionFisica;
        }

        $item->save();

        // Crear la carpeta con el nombre de la matrícula
        $matricula = $request->numero_control;
        $carpetaAlumno = public_path('Alumnos/' . $matricula);
        if (!file_exists($carpetaAlumno)) {
            mkdir($carpetaAlumno, 0777, true);
        }

        $carpetaHorasCivicas = $carpetaAlumno . '/HorasCivicas';
        $carpetaHorasDeportivas = $carpetaAlumno . '/HorasDeportivas';
        $carpetaHorasCulturales = $carpetaAlumno . '/HorasCulturales';
        if (!file_exists($carpetaHorasCivicas)) {
            mkdir($carpetaHorasCivicas, 0777, true);
        }
        if (!file_exists($carpetaHorasDeportivas)) {
            mkdir($carpetaHorasDeportivas, 0777, true);
        }
        if (!file_exists($carpetaHorasCulturales)) {
            mkdir($carpetaHorasCulturales, 0777, true);
        }

        // ...

        Alert::success('Agregado', 'Se agregó correctamente');
        return redirect('/inicio');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $titulo = "Eliminar Alumnos";
        $items = Alumnos::find($id);
        $carreras = Carreras::all();
        return view("/crud/eliminar", compact('items', 'titulo', 'carreras'));
    }

    public function datos_A($id)
    {
        $titulo = "Subir archivos";
        $items = Alumnos::find($id);
        $carreras = Carreras::all();
        $creditos = Creditos::all();
        return view("misArchivos.agregarArchivo", compact('items', 'titulo', 'carreras', 'creditos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $titulo = 'Actualizar datos';
        $items = Alumnos::find($id);
        $carreras = Carreras::all();
        return view("/crud/edit", compact('items', 'titulo', 'carreras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ini_set('post_max_size', '16M');
        $item = Alumnos::find($id);
        $item->nombre_alumno = $request->nombre_alumno;
        $item->numero_control = $request->numero_control;
        $item->telefono = $request->telefono;
        $item->id_carrera = $request->carrera; // Asignar el ID de la carrera seleccionada
        $item->fecha_nacimiento = $request->fecha_nacimiento;
        $item->escuela_anterior = $request->escuela_anterior;
        $item->fecha_ingreso = $request->fecha_ingreso;
        $item->save();


        // Obtener el tipo de crédito seleccionado
        $credito = $request->credito;

        // Obtener el evento o taller y la ubicación física
        $eventoTaller = $request->nombre_evento;
        $ubicacionFisica = $request->ubicacion_fisica;

        // Guardar el evento o taller y la ubicación física en las columnas correspondientes según el tipo de crédito
        if ($credito === 'Cultural') {
            $item->eventoTallerCultural = $eventoTaller;
            $item->ubicacionFisicaCultural = $ubicacionFisica;
        } elseif ($credito === 'Deportivo') {
            $item->eventoTallerDeportiva = $eventoTaller;
            $item->ubicacionFisicaDeportiva = $ubicacionFisica;
        } elseif ($credito === 'Civico') {
            $item->eventoTallerCivico = $eventoTaller;
            $item->ubicacionFisicaCivica = $ubicacionFisica;
        }

        $item->save();

        // Crear la carpeta con el nombre de la matrícula
        $matricula = $request->numero_control;
        $carpetaAlumno = public_path('Alumnos/' . $matricula);
        if (!file_exists($carpetaAlumno)) {
            mkdir($carpetaAlumno, 0755, true);
        }

        $carpetaHorasCivicas = $carpetaAlumno . '/HorasCivicas';
        $carpetaHorasDeportivas = $carpetaAlumno . '/HorasDeportivas';
        $carpetaHorasCulturales = $carpetaAlumno . '/HorasCulturales';
        if (!file_exists($carpetaHorasCivicas)) {
            mkdir($carpetaHorasCivicas, 0755, true);
        }
        if (!file_exists($carpetaHorasDeportivas)) {
            mkdir($carpetaHorasDeportivas, 0755, true);
        }
        if (!file_exists($carpetaHorasCulturales)) {
            mkdir($carpetaHorasCulturales, 0755, true);
        }

        // ...


        Alert::success('Actualizado', 'Se actualizó correctamente');
        return redirect('/inicio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Alumnos::find($id);
        $item->delete();
        Alert::error('Eliminado', 'Se eliminó correctamente');
        return redirect('/inicio');
    }

    /**
     * Guarda el archivo en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function guardarArchivo(Request $request, $id)
    {
        $idCredito = $request->input('credito');

        $archivo = new Archivo();
        $archivo->nombre_archivo = $request->nombre_archivo;
        $archivo->id_credito = $idCredito;
        // Resto de los campos del archivo...
        $archivo->save();

        Alert::success('Archivo guardado', 'El archivo se guardó correctamente');
        return redirect('/');
    }

    public function updateArchivo(Request $request, $id)
    {
        $item = Alumnos::find($id);
        // Obtener el tipo de crédito seleccionado
        $credito = $request->credito;
        
        // Obtener el evento o taller y la ubicación física
        $eventoTaller = $request->nombre_evento;
        $ubicacionFisica = $request->ubicacion_fisica;
        
        // Guardar el evento o taller y la ubicación física en las columnas correspondientes según el tipo de crédito
        if ($credito === 'Cultural') {
            
            $item->horaCultural = $eventoTaller;
            
            $item->ubicacionFisicaCultural = $ubicacionFisica;
            $carpetaDestino = 'HorasCulturales';
        } elseif ($credito === 'Deportivo') {
            $item->horaDeportiva = $eventoTaller;
            $item->ubicacionFisicaDeportiva = $ubicacionFisica;
            
            $carpetaDestino = 'HorasDeportivas';
        } elseif ($credito === 'Cívico') {
            $item->horaCivica = $eventoTaller;
            $item->ubicacionFisicaCivica = $ubicacionFisica;
            
            $carpetaDestino = 'HorasCivicas';
        }
        $item->save();
        $nMatricula = $item->numero_control;
      
        $carpetaAlumno = public_path('Alumnos/' . $nMatricula);
        $carpetaCivicaEvidencias = $carpetaAlumno . '/HorasCivicas/Evidencias';
        $carpetaCivicaMooc = $carpetaAlumno . '/HorasCivicas/Mooc';
        $carpetaCulturalEvidencias = $carpetaAlumno . '/HorasCulturales/Evidencias';
        $carpetaCulturalMooc = $carpetaAlumno . '/HorasCulturales/Mooc';
        $carpetaDeportivasEvidencias = $carpetaAlumno . '/HorasDeportivas/Evidencias';
        $carpetaDeportivasMooc = $carpetaAlumno . '/HorasDeportivas/Mooc';
        
        if (!file_exists($carpetaCivicaEvidencias)) {
            mkdir($carpetaCivicaEvidencias, 0777, true);
        }
        if (!file_exists($carpetaCivicaMooc)) {
            mkdir($carpetaCivicaMooc, 0777, true);
        }
        if (!file_exists($carpetaCulturalEvidencias)) {
            mkdir($carpetaCulturalEvidencias, 0777, true);
        }
        if (!file_exists($carpetaCulturalMooc)) {
            mkdir($carpetaCulturalMooc, 0777, true);
        }
        if (!file_exists($carpetaDeportivasEvidencias)) {
            mkdir($carpetaDeportivasEvidencias, 0777, true);
        }
        if (!file_exists($carpetaDeportivasMooc)) {
            mkdir($carpetaDeportivasMooc, 0777, true);
        }
        if ($credito === 'Cívico') {
            if ($request->hasFile('evidencias_constancias')){
                $archivo = $request->file('evidencias_constancias');
                $nombreArchivo = 'evidencias.pdf';
                $rutaDestino = $carpetaCivicaEvidencias;
                $archivo->move($rutaDestino, $nombreArchivo);
            }
            
            if ($request->hasFile('mooc')) {
               $archivo2 = $request->file('mooc');
            $nombreArchivo = 'Mooc.pdf';
            $rutaDestino = $carpetaCivicaMooc;
            $archivo2->move($rutaDestino, $nombreArchivo);
            }
            
        }
        if ($credito === 'Deportivo') {
            if($request->hasFile('evidencias_constancias')){
                $archivo = $request->file('evidencias_constancias');
                $nombreArchivo = 'evidencias.pdf';
                $rutaDestino = $carpetaDeportivasEvidencias;
                $archivo->move($rutaDestino, $nombreArchivo);
            }
            
            if ($request->hasFile('mooc')) {
                $archivo2 = $request->file('mooc');
                $nombreArchivo = 'Mooc.pdf';
                $rutaDestino = $carpetaDeportivasMooc;
                $archivo2->move($rutaDestino, $nombreArchivo);
            }
            
        }
        if ($credito === 'Cultural') {
            if ($request->hasFile('evidencias_constancias')) {
                $archivo = $request->file('evidencias_constancias');
                $nombreArchivo = 'evidencias.pdf';
                $rutaDestino = $carpetaCulturalEvidencias;
                $archivo->move($rutaDestino, $nombreArchivo);
            }
            
            if ($request->hasFile('mooc')) {
                $archivo2 = $request->file('mooc');
                $nombreArchivo = 'Mooc.pdf';
                $rutaDestino = $carpetaCulturalMooc;
                $archivo2->move($rutaDestino, $nombreArchivo);
            }
            
        }

        // Asegúrate de importar la clase Alert y utilizarla correctamente
        Alert::success('Incertado', 'Se incerto correctamente');
        return redirect('/misArchivos/tabla');
    }

    public function verArchivos(Request $request, $id)
    {
        $titulo = 'verArchivos';
        $items = Alumnos::find($id);
        $nMatricula = $items->numero_control;
        $evidenciaCivicapdf = ('Alumnos/' . $nMatricula . '/HorasCivicas/Evidencias/evidencias.pdf');
        $moocCivicapdf = ('Alumnos/' . $nMatricula . '/HorasCivicas/Mooc/Mooc.pdf');
        $evidenciaCulturalespdf = ('Alumnos/' . $nMatricula . '/HorasCulturales/Evidencias/evidencias.pdf');
        $moocCulturalespdf = ('Alumnos/' . $nMatricula . '/HorasCulturales/Mooc/Mooc.pdf');
        $evidenciaDeportivaspdf = ('Alumnos/' . $nMatricula . '/HorasDeportivas/Evidencias/evidencias.pdf');
        $moocDeportivaspdf = ('Alumnos/' . $nMatricula . '/HorasDeportivas/Mooc/Mooc.pdf');


        $existeMoocCivico = file_exists(public_path($moocCivicapdf));
        $existeEvidenciasCivicas = file_exists(public_path($evidenciaCivicapdf));

        $existeMoocDeportivas = file_exists(public_path($moocDeportivaspdf));
        $existeEvidenciasDeportivas = file_exists(public_path($evidenciaDeportivaspdf));

        $existeMoocCulturales = file_exists(public_path($moocCulturalespdf));
        $existeEvidenciasCulturales = file_exists(public_path($evidenciaCulturalespdf));
        
        return view('/misArchivos/verArchivos', compact(
            'titulo',
            'items',
            'nMatricula',
            'evidenciaCivicapdf',
            'moocCivicapdf',
            'evidenciaCulturalespdf',
            'moocCulturalespdf',
            'evidenciaDeportivaspdf',
            'moocDeportivaspdf', 'existeMoocCivico','existeEvidenciasCivicas', 'existeMoocDeportivas', 'existeEvidenciasDeportivas',
            'existeMoocCulturales','existeEvidenciasCulturales'
        ));

        
    }


    public function eliminarArchivo(Request $request)
    {
        $rutaArchivo = $request->input('ruta');
 
        if (File::exists($rutaArchivo)) {
            File::delete($rutaArchivo);
            return Response::json(['message' => 'Archivo eliminado correctamente']);
        } else {
            return Response::json(['message' => 'El archivo no existe'], 404);
        }
    }

    public function constanciaCivica ($id, Dompdf $pdf){
        $alumno = Alumnos::find($id);
        if (!$alumno) {

        }
        if ($alumno->horaCivica >= 20) {
            $options = new Options();
            $options = new Options(); $options->set('isRemoteEnabled', true);
            $options->set('isHtml5ParserEnabled', true);
            $pdf->setOptions($options);
            $pdf->loadHtml(view('constancia-civica', ['alumno' => $alumno])->render());
            $pdf->render();
            return $pdf->stream('constancia_civica.pdf');
        
        } else{
            
        }
    }

    public function constanciaDeportiva ($id, Dompdf $pdf){
        $alumno = Alumnos::find($id);
        if (!$alumno) {

        }
        if ($alumno->horaDeportiva >= 20) {
            $options = new Options();
            $options = new Options(); $options->set('isRemoteEnabled', true);
            $options->set('isHtml5ParserEnabled', true);
            $pdf->setOptions($options);
            $pdf->loadHtml(view('constancia-deportiva', ['alumno' => $alumno])->render());
            $pdf->render();
            return $pdf->stream('constancia_deportiva.pdf');
        
        } else{
            
        }
    }
    public function constanciaCultural ($id, Dompdf $pdf){
        $alumno = Alumnos::find($id);
        if (!$alumno) {

        }
        if ($alumno->horaCultural >= 20) {
            $options = new Options();
            $options = new Options(); $options->set('isRemoteEnabled', true);
            $options->set('isHtml5ParserEnabled', true);
            $pdf->setOptions($options);
            $pdf->loadHtml(view('constancia-cultural', ['alumno' => $alumno])->render());
            $pdf->render();
            return $pdf->stream('constancia_cultural.pdf');
        
        } else{
            
        }
    }
    public function formularioEvento($id)
    {
        $titulo = 'Evento';
        $alumno = Alumnos::find($id);
        return view('reporte', compact('alumno', 'titulo', 'id'));

    }

    public function reporteHoras (Request $request,  Dompdf $pdf){

            // Obtener los datos del formulario
            $id = $request->input('id'); 
            
            $evento = $request->input('evento');
            $horas = $request->input('horas');
            $tipoCredito = $request->input('tipo_credito');
     
            // Actualizar los datos en la tabla "Ingreso"
            $ingreso = Alumnos::find($id);
            $matricula = $ingreso-> numero_control;
            $nombreAlumno = $ingreso->nombre_alumno;
            $fechaActual = now()->format('Y-m-d');
            $carrera = $ingreso->id_carrera;
     
            if ($tipoCredito === 'Cívico') {
                $ingreso->horaCivica += $horas;
            } elseif ($tipoCredito === 'Deportivo') {
                $ingreso->horaDeportiva += $horas;
            } elseif ($tipoCredito === 'Cultural') {
                $ingreso->horaCultural += $horas;
            }
     
            $ingreso->save();
     
            // Generar el PDF con los datos del alumno y del formulario
     
            // Personalizar las opciones de configuración
            $options = new Options();
            $options->set('isRemoteEnabled', true); // Habilitar la carga de recursos remotos
            $options->set('isHtml5ParserEnabled', true); // Habilitar el análisis HTML5
     
            // Aplicar las opciones de configuración al objeto Dompdf
            $pdf->setOptions($options);
     
            // Cargar la vista comprobante-evento.blade.php con los datos necesarios
            $pdf->loadHtml(View::make('reporteHoras', ['matricula' => $matricula, 'evento' => $evento, 'horas' => $horas, 'tipoCredito' => $tipoCredito, 'nombre' => $nombreAlumno, 'fecha' => $fechaActual, 'carrera' => $carrera])->render());
     
            $pdf->render();
            //return view('reporteHoras', ['alumnoId' => $alumnoId, 'evento' => $evento, 'horas' => $horas, 'tipoCredito' => $tipoCredito, 'nombre' => $nombreAlumno, 'fecha' => $fechaActual, 'carrera' => $carrera]);
     
            // Generar el PDF
            $pdf->stream('comprobante.pdf');
     
            // Redirigir al usuario a la vista index.blade.php con un mensaje flash
            return redirect('/');
        
    }

    public function empresa()
    {
        $titulo = 'CORENADR';
        return view('/empresa', compact('titulo'));
    }


}
