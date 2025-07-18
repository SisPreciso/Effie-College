@php
    $qst5a = $question;
@endphp
<div id="qst5a" class="tabcontent" style="display:block">
    <div class="fila">
        <div class="columna columna-1"><label>{{ $qst5a->code }}</label>
            <p><strong>VIDEO</strong></p>
            <br>
            <ul>
                <li>La duración máxima del video es de 3 minutos.</li>
                <li>El video deberá subirse en formato 1080 px, comprimido en H.264 (es recomendable que sea mp4) o también realizar el envío por Quicktime, en alta resolución y comprimido en H.264.</li>
                <li>Nombrar tu archivo como: <b>marcapatrocinadora_IDequipo(video).mp4</b> (tamaño máximo: 500MB)</li>
                <!--li>El <b>Formulario de Autorización, Confidencialidad y Cesión de derechos</b> (<a
                        href="documentos/{{ now()->year }}_EffieCollegePeru_Formulario Autorización.docx"
                        alt="Descargar documento"
                        target="_blank" style="color: #cbb27c;font-style: italic;">descárgalo aquí</a>) acredita que
                    ni
                    el tutor académico ni los alumnos tienen vínculo alguno con la marca, su competencia y/o alguna de
                    sus agencias. Este formulario, además, explicita que el tutor académico labora en la institución
                    donde se forman los alumnos miembros del equipo. Súbelo en formato PDF, con un tamaño menor a 200KB.
                    Nómbralo <b>Marca_IDequipo(firma).pdf</b></li-->
            </ul>
            <br>
            <p><strong>FORMULARIO DE AUTORIZACIÓN, CONFIDENCIALIDAD Y CESIÓN DE DERECHOS</strong></p>
            <br>
            <ul>
                <!--<li>Descarga <b><a href="documentos/{{ now()->year }}_EffieCollegePeru_Formulario Autorización.docx" alt="Descargar documento" target="_blank" style="color: #cbb27c;font-style: italic;"> aquí</a></b> el formulario que certifica que ni el tutor académico ni los alumnos tienen relación alguna con la marca, sus competidores y/o cualquiera de sus agencias.</li-->
                <li>Descarga<b><a href="{{ route('downloadAuthorization') }}"  alt="Descargar documento" target="_blank" style="color: #cbb27c;font-style: italic;"> aquí</a></b> el formulario que certifica que ni el tutor académico ni los alumnos tienen relación alguna con la marca, sus competidores y/o cualquiera de sus agencias.</li>
                <li>Debe ser firmado por el tutor, no se acepta firma electrónica.</li>
                <li>Detallar el nombre y DNI de los alumnos efectivamente participaron en la elaboración de la propuesta. Los nombres de estos alumnos se considerarán definitivos para efectos de publicación de finalistas y ganadores. No se admiten cambios.</li>
                <li>Subir en formato PDF, con un tamaño menor a 200KB.</li>
                <li>Nombrar el archivo <strong>marcapatrocinadora_IDequipo(firma).pd</strong></li>
            </ul>
            <label>{{ $qst5a->remark }}</label>
            <input type="hidden" name="user_id" id="user_id" value="{{ auth()->id() }}">
            @if(!$user->is_completed)
                <form method="POST" action="{{ route('files.store') }}" role="form" id="frm-file" class="dato">
                    @csrf
                    <div class="files">
                        <div class="columna columna-2"><input type="file" name="filedata" id="filedata" required></div>
                        <div class="columna columna-3"><input type="text" name="filename" id="filename" maxlength="100"
                                                              placeholder="Nombre del archivo" required></div>
                        <div class="columna columna-4">
                            <!--<center>
                                <button type="submit" class="btn-effie">{{ __('Agregar') }}</button>
                            </center>-->
                        </div>
                    </div>
                    <div class="span-done" id="ans5a-done-div"><span id="ans5a-done-msg"></span></div>
                    <div class="span-fail" id="ans5a-fail-div"><span id="ans5a-fail-msg"></span></div>
                </form>
            @endif
            <!--div class="span-done" id="ans5a-done-div" style="display: block; margin-bottom: 1rem;">
                <p><strong id="ans5a-done-msg">¡Atención!</strong></p>
                <br>
                <p>Por favor, renombre sus videos en el siguiente formato: <strong>Marca_IDequipo(video).mp4</strong>. Luego, súbalos a <a href="https://wetransfer.com/" target="_blank" style="font-weight: bold;">Wetransfer</a> y comparta el enlace de descarga por correo electrónico a la siguiente dirección: <a style="font-weight: bold;" href="mailto:sistemas@grupopreciso.pe">sistemas@grupopreciso.pe</a>. Asegúrese de utilizar el asunto siguiente en su correo: <strong>Marca IDEQUIPO - Video Propuesta</strong>.</p>
                <br>
                <p>Recordar que el video no puede superar los 3 minutos.</p>
            </div-->
            <h3 class="card-subtitle">{{ __('Archivos cargados') }}</h3>
            <table id="tbl-files" class="tablealumno">
                <thead>
                <th width="40%">{{ __('Archivo') }}</th>
                <th width="40%">{{ __('Nombre (alias)') }}</th>
                <th width="10%">{{ __('Fecha de carga') }}</th>
                @if (!$user->is_completed)
                    <th width="10%">{{ __('Eliminar') }}</th>
                @endif
                </thead>
                <tbody>
                @foreach ($user->files as $file)
                    <tr>
                        <td><i class="fa fa-file-o"></i>&nbsp;{{ $file->filedata }}</td>
                        <td>{{ $file->filename }}</td>
                        <td>
                            <center>{{ Carbon\Carbon::parse($file->created_at)->format('d/m/Y') }}</center>
                        </td>
                        <td></td>
                        <!--@if (!$user->is_completed)
                            <td>
                                <center><a onclick="removeFile({{ $file->id }})"><i class="fa fa-trash"></i></a>
                                </center>
                            </td>
                        @endif-->
                    </tr>
                @endforeach</tbody>
            </table>
            @if($user->is_completed)
                <h3 class="card-subtitle">{{ __('Video cargado') }}</h3>
                @php($video = '')
                @foreach($user->files as $file)
                    @if (\Illuminate\Support\Str::contains($file->filedata, '.mp4'))
                        @php($video = $file->filedata)
                    @endif
                @endforeach
                <center>
                    @if($video)
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
                        <div class="text-inscripcion"><p>{{ __('El equipo no ha enviado video.') }}</p></div>
                    @endif
                </center>
                <div class="space"></div>
            @else
                <!--<form method="POST" action="{{ route('sendProposal') }}" role="form" id="frm-send">
                    @csrf
                    <center>
                        <button type="submit"
                                onclick="return confirm('Estás a punto de enviar tu propuesta para la marca elegida por tu equipo. Pasado este punto, no podrás editar tus respuestas. ¿Deseas continuar?')"
                                class="btn-effie">{{ __('Enviar') }}</button>
                    </center>
                </form>-->
                <div class="space"></div>
            @endif
            <div class="space"></div>
        </div>
    </div>
</div>
