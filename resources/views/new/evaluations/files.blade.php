@php
    $qst5a = $question;
@endphp
<div id="qst5a" class="tabcontent" style="display:block">
    <div class="fila">
        <div class="columna columna-1"><label>{{ $qst5a->code }}</label>
            <ul>
                <li>La duración máxima del video que subas es de 3 minutos. No te pases de ese tiempo.</li>
                <li>Debes subir el video en formato 1080 px, comprimido en H.264 (es recomendable que sea mp4) o también
                    realizar el envío por Quicktime, en alta resolución y comprimido en H.264.
                </li>
                <li>Nombrar tu archivo como: <b>Marca_IDequipo(video).mp4</b> (tamaño máximo: 500MB)</li>
                <li>El <b>Formulario de Autorización, Confidencialidad y Cesión de derechos</b> (<a
                        href="documentos/{{ now()->year }}_EffieCollegePeru_Formulario Autorización.docx"
                        alt="Descargar documento"
                        target="_blank" style="color: #cbb27c;font-style: italic;">descárgalo aquí</a>) acredita que
                    ni
                    el tutor académico ni los alumnos tienen vínculo alguno con la marca, su competencia y/o alguna de
                    sus agencias. Este formulario, además, explicita que el tutor académico labora en la institución
                    donde se forman los alumnos miembros del equipo. Súbelo en formato PDF, con un tamaño menor a 200KB.
                    Nómbralo <b>Marca_IDequipo(firma).pdf</b></li>
            </ul>
            <h3 class="card-subtitle">{{ __('Video cargado') }}</h3>
            @php($video = '')
            @php($document = '')
            @foreach ($user->files as $file)
                @if (\Illuminate\Support\Str::contains($file->filedata, '.mp4'))
                    @php($video = $file->filedata)
                @elseif(\Illuminate\Support\Str::contains($file->filedata, '.pdf'))
                    @php($document = $file->filedata)
                @endif
            @endforeach
            <center>
                @if ($video)
                    @if (\Illuminate\Support\Str::contains($video, 'https'))
                            <video width="600" controls>
                                <source src="{{ $video }}"
                                        type="video/mp4">{{ __('Your browser does not support the video tag.') }}</video>
                    @else
                        <video width="600" controls>
                            <source src="{{ config('services.backend.files') . "/storage/files/{$video}" }}"
                                    type="video/mp4">{{ __('Your browser does not support the video tag.') }}</video>
                        {{--                            <source src="{{ \Illuminate\Support\Facades\Storage::url($video) }}"--}}
                        {{--                                    type="video/mp4">{{ __('Your browser does not support the video tag.') }}</video>--}}
                    @endif
                @else
                    <div class="text-inscripcion"><p>{{ __('El equipo aún no ha cargado su video.') }}</p></div>
                @endif
            </center>
            @if (in_array(auth()->user()->situation, ['ADMINISTRADOR']))
                <h2 class="card-subtitle" style="margin-top: 2rem;">FORMULARIO DE AUTORIZACIÓN, CONFIDENCIALIDAD Y
                    CESIÓN DE
                    DERECHOS</h2>
                <p style="white-space: normal; margin-bottom: 1rem;">El formato del formulario lo pueden descargar en la
                    misma plataforma de Effie College donde llenado su
                    propuesta.</p>
                <ul>
                    <li>Debe ser firmado por el tutor, no se acepta firma electrónica.</li>
                    <li>Detallar el nombre y DNI de los alumnos participantes que participaron en la elaboración de la
                        propuesta.
                    </li>
                    <li>Subir en formato PDF.</li>
                    <li>Nombrar marcapatrocinadora_IDequipo(firma).pdf</li>
                </ul>
                <center>
                    @if ($document)
                        <div class="space"></div>
                        <div class="text-inscripcion">
                            <p>{{ __('Formulario de Autorización, Confidencialidad y Cesión de derechos') }}</p><a
                                href="{{ "{$document}" }}"
                                class="btn-effie"
                                target="__blank">{{ __('Descarga') }}</a></div>
                    @else
                        <div class="text-inscripcion">
                            <p>{{ __('El equipo aún no ha cargado su documento de Autorización, Confidencialidad y Cesión de derechos.') }}</p>
                        </div>
                    @endif
                </center>
            @endif
            <div class="space"></div>
        </div>
    </div>
</div>
