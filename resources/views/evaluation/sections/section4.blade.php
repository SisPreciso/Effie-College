@php 
    $sect4 = $sections->get($edition.'S4');
    $qst4a = $sect4->questions[0];
    $qst4c = $sect4->questions[1];
    $qst4d = $sect4->questions[2];
@endphp
<div class="tab-step">
    <h3 class="card-subtitle">{{ $sect4->title }}</h3>
    <p>{{ $sect4->description }}</p>
    <ul>
        <li>
            Cuando completes cada una de las preguntas, debes hacer clic en Guardar para registrar tus respuestas. No pases a la siguiente pregunta sin guardar la anterior.
        </li>
        <li>
            Puedes editar tus respuestas luego de guardadas. Pero una vez que el caso se envía, ya no tienes opción de editar.
        </li>
        <li>
            Respeta el número máximo de palabras por respuesta, de otra manera no se guardará.
        </li>
        <li>
            Si incluyes imágenes, debes usar formatos .gif y .jpg, pero no en pdf. Las imágenes complementan el sentido del texto.
        </li>
    </ul>
    <br>
    @if(Auth::user()->situation === 'JURADO')
    <div class="fila">
        <div class="columna columna-3c"></div>
        <div class="columna columna-6">
            <i class="fa fa-check-square-o"></i>&nbsp;{{ __('Puntaje obtenido:') }}
        </div>
        <div class="columna columna-6">
            <input type="text" name="score4" value="{{ old('score4',$review->score4 ?? '') }}" onkeypress="return checkNumber(event)" {{ Auth::user()->is_finished ? 'disabled' : '' }}>
        </div>
    </div>
    <p class="dato"><i class="fa fa-info-circle"></i>&nbsp;<b>{{ __('Nota: ') }}</b>{{ __('El puntaje obtenido por el equipo debe estar entre uno (1) y diez (10).') }}</p>
    @endif
    <!-- Tab links -->
    <div class="tab">
        <button type="button" class="tablinks active" onclick="openQuestion(event,'qst4a')">{{ $qst4a->title }}</button>
        <button type="button" class="tablinks" onclick="openQuestion(event,'qst4c')">{{ $qst4c->title }}</button>
        <button type="button" class="tablinks" onclick="openQuestion(event,'qst4d')">{{ $qst4d->title }}</button>
    </div>
    <!-- Tab content -->
    <div>
        @include('evaluation/questions/question4a')
        @include('evaluation/questions/question4c')
        @include('evaluation/questions/question4d')
    </div>
    <br>
</div>