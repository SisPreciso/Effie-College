@extends('layouts.noticeView')
@section('content')
    <h1 class="cuerpo-gracias__title">¡Gracias por inscribirte en <br>en Effie College 2024!</h1>
    <!--h1 class="cuerpo-gracias__title">¡Gracias por inscribirte en <br>en {{ config('app.name', 'Laravel') }}!</h1-->
    <p class="cuerpo-gracias__contenido" style="max-width: 570px; line-height: 1.7em">
        Por favor, verifica tu bandeja de entrada para confirmar tu participación en esta edición.
    </p>
    <p class="cuerpo-gracias__contenido" style="max-width: 570px; line-height: 1.7em">
        Si aún no has recibido el correo, contáctanos de inmediato a <a
            href="mailto:sistemaspreciso@preciso.pe" style="text-decoration: underline;">sistemaspreciso@preciso.pe</a> con el asunto <strong>Inscripción Effie College 2024</strong>
    </p>
    <p class="cuerpo-gracias__contenido" style="max-width: 570px; line-height: 1.7em">
        *Revisa tu bandeja de correo no deseado o spam si no encuentras el correo.
    </p>
    <p class="cuerpo-gracias__contenido" style="max-width: 570px; line-height: 1.7em">
        <b>¡Esperamos tus mejores ideas!</b>
    </p>
@endsection
