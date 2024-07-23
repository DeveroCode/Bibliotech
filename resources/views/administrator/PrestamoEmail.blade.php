<!DOCTYPE html>
<html>

<head>
    <title>Notificación de Préstamo de Libro</title>
</head>

<body style="font-family: Arial, sans-serif; padding: 20px;">
    <div
        style="background-color: #1f2937; color: white; border-radius: 10px; padding: 20px; max-width: 600px; margin: 0 auto;">
        <h1 class="font-bold text-center">Hola, {{ $alumno->nombre }} {{ $alumno->apellidoM }}</h1>
        <span style="font-size: 24px; font-weight: bold; text-align: center;">Gracias por solicitar el préstamo!</span>
        <p style="text-align: center; color: #9ca3af;">hemos recibido el préstamo con folio No. {{ $prestamo->folio
            }}</p>

        <table style="width: 100%; margin-top: 20px;">
            <tr>
                <td style="color: #9ca3af;">Nombre del libro :</td>
                <td style="text-align: right;">{{ $libro->titulo }}</td>
            </tr>
            <tr>
                <td style="color: #9ca3af;">Día solicitado:</td>
                <td style="text-align: right;">{{ $prestamo->fecha_inicio }}</td>
            </tr>
        </table>

        <table
            style="width: 100%; margin-top: 20px; border-top: 1px solid #374151; border-bottom: 1px solid #374151; padding-top: 10px; padding-bottom: 10px;">
            <tr>
                <th style="text-align: left; color: #9ca3af;">Descripción del préstamo</th>
                <th style="text-align: right; color: #9ca3af;">Cantidad</th>
            </tr>
            <tr>
                <td>Retraso por dia</td>
                <td style="text-align: right;">$90.00</td>
            </tr>
            <tr>
                <td>Perdida del libro</td>
                <td style="text-align: right;">$540.00</td>
            </tr>
            <tr>
                <td style="padding-top: 10px; font-weight: bold;">Total</td>
                <td style="padding-top: 10px; text-align: right; font-weight: bold; color: #7c3aed;">$630.00</td>
            </tr>
        </table>

        <div style="margin-top: 20px; text-align: center;">
            <p
                style="background-color: #374151; padding: 10px; border-radius: 5px; display: inline-block; font-weight: bold;">
                Favor de no contestar a este correo electrónico.
            </p>

            <span style="text-align: center; color: #9ca3af; font-size: 12px; display: block; margin-top: 10px;">
                Los costos anteriormente mencionados, solo aplica en caso de perdida del libro o por día de retraso, en
                caso de perder el libro, se le cobrará el monto total incluyendo los días de retraso en caso de no dar
                aviso inmediato
            </span>
        </div>
    </div>
</body>

</html>