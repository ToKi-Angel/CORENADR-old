<!DOCTYPE html>
<html>
 
<head>
    <meta charset="utf-8">
    <title>Comprobante de evento</title>
    <style>
        table,
        td,
        th {
            border: 1px solid #000000;
            border-collapse: collapse;
        }
 
        .logoTECNM {
            width: 200px;
            height: 72px;
        }
        .logoMA {
            width: 72px;
            height: 72px;
        }
    </style>
</head>
 
<body>
 
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td rowspan="2">
                                <img src="https://www.tecnm.mx/assets/files/main/img/pleca_tecnm.jpg?img=28"
                                    alt=""
                                    style="text-align: center; vertical-align: middle; bold; font-size: 12px;"
                                    class="logoTECNM">
                            </td>
                            <td colspan="2" style="text-align: center; font-weight: bold; font-size: 20px;">Instituto
                                Tecnológico de Milpa Alta II</td><td rowspan="2" style="text-align: center;">
                                    <img src="https://milpaalta2.tecnm.mx/img/itma2.webp" alt="" class="logoMA">
                                  </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center; font-weight: bold; font-size: 15px;">
                                Departamento de Actividades
                                Extraescolares</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">N° de Control</td>
                            <td style="text-align: center;">{{ $matricula }}</td>
                            <td style="text-align: center;">Periodo</td>
                            <td style="text-align: center;">Enero - Junio 2023</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">Nombre</td>
                            <td colspan="3" style="text-align: center; font-weight: bold;">{{ $nombre }}</td>
                        </tr>
                        <tr>
                            <td rowspan="2" style="text-align: center;">Actividad</td>
                            <td rowspan="2" style="text-align: center;">{{ $evento }}</td>
                            <td style="text-align: center;">Fecha</td>
                            <td style="text-align: center;">Carrera</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">{{ $fecha }}</td>
                            <td style="text-align: center;">@if ($carrera == 1)
                                <p>Carrera: Ing. Gestión Empresarial</p>
                            @elseif ($carrera == 2)
                                <p>Carrera: Ing. Industrial</p>
                            @elseif ($carrera == 3)
                                <p>Carrera: Ing. Sistemas Computacionales</p>
                            @else
                                <p>Carrera desconocida</p>
                            @endif</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;">Horas Acreditadas</td>
                            <td colspan="2" style="text-align: center;">{{ $horas }} horas de tipo
                                {{ $tipoCredito }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
 
        </div>
        <div class="row">
            <div class="col">
                <p style="text-align: justify;"><b>NOTA: </b>EL ALUMNO DEBE CONSERVAR ESTE DOCUMENTO Y ENTREGARLO AL
                    DEPARTAMENTO DE EXTRAESCOLARES AL COMPLEMENTAR UN CRÉDITO EQUIVALENTE A 20
                    HRS.</p>
                <p style="text-align: justify;">
                    ESTE DOCUMENTO SERÁ JUSTIFICACIÓN PARA SUS ACTIVIDADES EXTRAESCOLARES EN
                    CADA UNA DE SUS ASIGNATURAS.
                </p>
                <p style="text-align: justify;">
                    PARA QUE TENGA VALIDEZ ESTE DOCUMENTO DEBE TENER FIRMA Y SELLO DEL JEFE DEL
                    DEPARTAMENTO QUE PROPORCIONA EL APOYO.
                </p>
                <p style="text-align: justify;">
                    SI EXISTIERA ALGÚN ERROR EN CUALQUIER DATO PRESENTADO, FAVOR DE AVISAR DE
                    INMEDIATO PARA CORREGIRLO.
                </p>
                <br><br><br><br><br><br>
                <p style="text-align: center; font-weight: bold;">
                    ING. AQUINO SEGURA ROLDAN
                    <br>
                    <br>
                    JEFE DEL DEPARTAMENTO DE ACTIVIDADES
                    <br>
                    EXTRAESCOLARES
                    <br><br>
                    ________________________________________________
                </p>
            </div>
        </div>
    </div>


 
</body>

 
</html>