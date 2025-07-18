<div class="tab-step">
    <h3 class="card-subtitle">{{ $section->title }}</h3>
    <p>{{ $section->description }}</p>
    <ul>
        <li>Cuando completes cada una de las preguntas, debes hacer clic en Guardar para registrar tus respuestas. No
            pases a la siguiente pregunta sin guardar la anterior.
        </li>
        <li>Puedes editar tus respuestas luego de guardadas. Pero una vez que el caso se envía, ya no tienes opción de
            editar.
        </li>
        <li>Respeta el número máximo de palabras por respuesta, de otra manera no se guardará.</li>
        <li>Si incluyes imágenes, debes usar formatos .gif y .jpg, pero no en pdf. Las imágenes complementan el sentido
            del texto (tamaño máximo: 2MB).
        </li>
    </ul>
    <br>
    @if(Auth::user()->situation === 'JURADO')
        @if(!\Illuminate\Support\Str::contains($section->code, 'S5'))
            <div class="fila">
                <div class="columna columna-3c"></div>
                <div class="columna columna-6">
                    <i class="fa fa-check-square-o"></i>&nbsp;{{ __('Puntaje obtenido:') }}
                </div>
                <div class="columna columna-6">
                    <input type="text" name="score{{ $number }}"
                           value="{{ old("score{$number}", $review->{"score{$number}"} ?? '') }}"
                           onkeypress="return checkNumber(event)" {{ Auth::user()->is_finished ? 'disabled' : '' }}>
                </div>
            </div>
            <p class="dato"><i
                    class="fa fa-info-circle"></i>&nbsp;<b>{{ __('Nota: ') }}</b>{{ __('El puntaje obtenido por el equipo debe estar entre uno (1) y diez (10).') }}
            </p>
        @endif
    @endif
    @php
        $value = ['a', 'b', 'c', 'd', 'e'];
    @endphp
    <div class="tab">
        @foreach($section->questions as $key => $question)
            <button class="tablinks {{ $key !== 0 ? '' : 'active' }}" type="button"
                    onclick="openQuestion(event, '{{ "qst{$number}{$value[$key]}" }}')">
                {{ $question->title }}
            </button>
        @endforeach
    </div>
    <div>
        @if(\Illuminate\Support\Str::contains($section->code, 'S5'))
            @include('new.evaluations.files', ['question' => $question])
        @else
            @foreach($section->questions as $key => $question)
                @include('new.evaluations.questions', ['question' => $question, 'number' => $number, 'value' => $value[$key]])
            @endforeach
        @endif
    </div>
    <br>
</div>
