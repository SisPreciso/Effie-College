@php
    $sect2 = $sections->get($edition.'S2');
    $qst2a = $sect2->questions[0];
    $qst2b = $sect2->questions[1];
    $qst2c = $sect2->questions[2];
@endphp
<div class="tab-step">
    <h3 class="card-subtitle">{{ $sect2->title }}</h3>
    <p>{{ $sect2->description }}</p>
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
        <button type="button" class="tablinks active" onclick="openQuestion(event,'qst2a')">{{ $qst2a->title }}</button>
        <button type="button" class="tablinks" onclick="openQuestion(event,'qst2b')">{{ $qst2b->title }}</button>
        <button type="button" class="tablinks" onclick="openQuestion(event,'qst2c')">{{ $qst2c->title }}</button>
    </div>
    <!-- Tab content -->
    <div>
        @include('questions/question2a')
        @include('questions/question2b')
        @include('questions/question2c')
    </div>
</div>