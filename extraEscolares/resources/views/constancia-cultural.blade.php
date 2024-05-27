<!DOCTYPE html>
<html>

<head>
    <title>Constancia Cultural</title>
    <style>
        table,
        td,
        th {
            border: 1px solid #000000;
            border-collapse: collapse;
            font-family: sans-serif;
        }

        .m {
            text-transform: uppercase;
        }

        th {
            background: #f0e6cc;
        }

        .even {
            background: #fbf8f0;
        }

        .odd {
            background: #fefcf9;
        }
    </style>
</head>

<body>
    <table>
        <tbody>
            <tr>
                <td rowspan="3"
                    style="text-align: left; font-weight: bold; font-size: 12px; width: 120px; height:70px;"><img src="https://www.tecnm.mx/images/dir_calidad/re/logo_calidad.jpg" alt=""></td>
                <td rowspan="2" style="text-align: left; font-weight: bold; font-size: 12px; width: 430px;">Constancia
                    de cumplimiento de actividad Cultural</td>
                <td style="text-align: left; font-weight: bold; font-size: 12px; width: 165px;">Código:TecNM-VI-PO-003-05
                </td>
            </tr>
            <tr>
                <td style="text-align: left; font-weight: bold; font-size: 12px;">Revisión: 0</td>
            </tr>
            <tr>
                <td style="text-align: left; font-weight: bold; font-size: 12px;">Referencia a la norma ISO 9001:32015
                    8.1</td>
                <td style="text-align: left; font-weight: bold; font-size: 12px;">Página 1 de 1</td>
            </tr>
        </tbody>


    </table>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <p style="text-align: center; font-weight: bold; font-size: 30px;">CONSTANCIA DE CUMPLIMIENTO DE
                    <br>ACTIVIDAD CULTURAL
                </p>
            </div>
            <div class="row">
                <div class="col-12">
                    <p style="text-align: left; font-weight: bold; font-size: 14px;">ELVIA GARCIA ROMERO<br>JEFE(A) DEL
                        DEPARTAMENTO DE SERVICIOS ESCOLARES<br>PRESENTE</p><br>
                    <p style="text-align: justify; font-size: 12px;">El que suscribe <b><u>AQUINO SEGURA ROLDAN</u></b>,
                        por este medio se permite hacer de su conocimiento el (la) estudiante <b
                            class="m"><u>{{ $alumno->nombre }} {{ $alumno->paterno }}
                                {{ $alumno->materno }}</u></b>, con número de control <b><u>{{ $alumno->id }}</u></b>
                        de la carrera <b><u>{{ $alumno->tipo }}</u></b>, ha cumplido su actividad
                        <b><u>CULTURAL</u></b> con el nivel de desempeño <B><U>EXCELENTE</U></B> y un valor numérico de
                        <B><U>4</U></B> durante el periodo escolar <B><U>Febrero – Junio 2023</U></B> con valor
                        curricular de 1 créditos.
                        <br><br>
                        Se extiende la presente en la CIUDAD DE MÉXICO a los <?php echo date('j'); ?> días del mes de
                        <?php echo date('n'); ?> de <?php echo date('Y'); ?>.
                        <br><br><br><br>
                    <p style="text-align: center;"><b>ATENTAMENTE</b></p>
                    <br><br><br><br><br><br><br><br><br>
                    <p></p>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table style="width: 100%">
                        <tbody >
                            <tr>
                                <td style="border: 1px solid #ffffff; vertical-align: middle;">
                                    <p style="text-align: center; font-size: 12px;">_________________________________</p><br>
                                    <p style="text-align: center; font-size: 10px; font-family:'Times New Roman'">ING. AQUINO SEGURA ROLDAN <br>
                                        Nombre y firma del (de la) profesor(a)
                                        <br> respnsable
                                    </p>
                                </td>
                                <td style="border: 1px solid #ffffff; vertical-align: middle;">
                                    <p style="text-align: center; font-size: 12px;">_________________________________</p><br>
                                    <p style="text-align: center; font-size: 10px; font-family:'Times New Roman';">ING. AQUINO SEGURA ROLDAN <br>
                                        Jefe(a) del Depto. de Actividades <br> Extraescolares
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
