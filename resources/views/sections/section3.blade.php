@php
    $sect3 = $sections->get($edition.'S3');
    $qst3a = $sect3->questions[0];
    $qst3b = $sect3->questions[1];
    $qst3c = $sect3->questions[2];
@endphp
<div class="tab-step">
    <h3 class="card-subtitle">{{ $sect3->title }}</h3>
    <p>{{ $sect3->description }}</p>
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
    <!-- Tab links -->
    <div class="tab">
        <button type="button" class="tablinks active" onclick="openQuestion(event,'qst3a')">{{ $qst3a->title }}</button>
        <button type="button" class="tablinks" onclick="openQuestion(event,'qst3b')">{{ $qst3b->title }}</button>
        <button type="button" class="tablinks" onclick="openQuestion(event,'qst3c')">{{ $qst3c->title }}</button>
    </div>
    <!-- Tab content -->
    <div>
        @include('questions/question3a')
        @include('questions/question3b')
        @include('questions/question3c')    
    </div>
</div>