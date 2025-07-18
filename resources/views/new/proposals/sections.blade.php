<div class="tab-step">
    <h3 class="card-subtitle">{{ $section->title }}</h3>
    <p>{{ $section->description }}</p>

    <!--ul>
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
    </ul-->
    <br>
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
            @include('new.proposals.files', ['question' => $question])
        @else
            @foreach($section->questions as $key => $question)
                @include('new.proposals.questions', ['question' => $question, 'number' => $number, 'value' => $value[$key]])
            @endforeach
        @endif
    </div>
</div>
