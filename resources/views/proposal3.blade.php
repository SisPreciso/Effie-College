@extends('layouts.app')
@section('content')
    {{--    @inject('sections','App\Services\Sections')--}}
    {{--    @inject('answers','App\Services\Answers')--}}
    {{--    @php--}}
    {{--        $user = Auth::user();--}}
    {{--        $edition = $user->caso->edition->name;--}}
    {{--        $sect5 = $sections->get($edition.'S5');--}}
    {{--        $qst5b = $sect5->questions[1];--}}
    {{--        $ans5b = $answers->get($qst5b->code,$user->username);--}}
    {{--    @endphp--}}
    <div class="card-introduccion">
        <div class="card-introduccion__container">
            <h1 class="card-title">{{ __('Bienvenido, equipo ') }} {{ $user->username }}</h1>
            <p class="cuerpo-gracias__contenido">{{ __('Te presentamos el Formulario de Participación, el cual se compone de cinco secciones. Cada una requiere textos, archivos y/o documentos que deberás completar para continuar con el proceso. ¡Mucha suerte!') }}</p>
        </div>
    </div>
    <div class="ficha">
        <h1 class="card-title">{{ __('Formulario de participación') }}</h1>
        <div class="logo">
            <img src="{{ asset($user->caso->brand->image) }}" alt="{{ $user->caso->brand->name }}"
                 class="logo__proposal">
        </div>
        <div class="space"></div>
        <div style="display: flex; flex-wrap: wrap; text-align: center;">
            <div style="flex: 33.3%;">
                <p class="dato">{{ __('Descargar el brief') }}</p>
                <a href="{{ route('downloadBrief', ['edition' => $user->caso->edition->name, 'brand' => $user->caso->brand->name]) }}"
                   id="btn-brief">
                    <i class="fa fa-download fa-2x"></i>
                </a>
            </div>
            <div style="flex: 33.3%;">
                <p class="dato">{{ __('Descargar la grabación') }}</p>
                <a href="{{ route('downloadAudio', ['edition' => $user->caso->edition->name, 'brand' => $user->caso->brand->name]) }}"
                   id="btn-recording">
                    <i class="fa fa-download fa-2x"></i>
                </a>
            </div>
            <div style="flex: 33.3%;">
                <p class="dato">{{ __('Descargar los materiales gráficos') }}</p>
                <a href="{{ route('downloadVisual', ['edition' => $user->caso->edition->name, 'brand' => $user->caso->brand->name]) }}"
                   id="btn-graphics">
                    <i class="fa fa-download fa-2x"></i>
                </a>
            </div>
        </div>
        <div class="space"></div>
        <h1 class="card-title">{{ __('Información general') }}</h1>
        @include('questions/question5b')
        <div class="space"></div>
        <div class="text-inscripcion">
            <p>{{ __('Puedes descargar aquí el formulario en formato Word') }}</p>
            <a href="{{ route('downloadForm', $user->caso->edition->name) }}" class="btn-effie">
                {{ __('Descargar') }}
            </a>
        </div>
    </div>
    <div class="card-introduccion">
        <div class="card-introduccion__container">
            <h1 class="card-title">{{ __('Secciones') }}</h1>
        </div>
        <div class="sections">
            <span onclick="openSection(0)" class="step active">{{ __('1') }}</span>
            <span onclick="openSection(1)" class="step">{{ __('2') }}</span>
            <span onclick="openSection(2)" class="step">{{ __('3') }}</span>
            <span onclick="openSection(3)" class="step">{{ __('4') }}</span>
            <span onclick="openSection(4)" class="step">{{ __('5') }}</span>
        </div>
        <br>
        <br>
    </div>
    <div id="subtitle" class="ficha">
        {{--        @include('sections/section1')--}}
        {{--        @include('sections/section2')--}}
        {{--        @include('sections/section3')--}}
        {{--        @include('sections/section4')--}}
        {{--        @include('sections/section5')--}}
        @foreach($sections as $index => $section)
            @php($number = $index + 1)
            @include('new.sections.show', ['number' => $number])
        @endforeach
    </div>
    <div class="space"></div>
@endsection

@include('popups/message')
@include('popups/history')

@section('script')
    <link rel="stylesheet" href="{{ asset('css/proposal2.css') }}">
    <link rel="stylesheet" href="{{ asset('LineControl/css/editor.css') }}">
    <script src="{{ asset('js/proposal/questions2.js') }}"></script>
    <script src="{{ asset('js/proposal/files5.js') }}"></script>
    @if($user->is_completed)
        <script src="{{ asset('LineControl/js/viewer.js') }}"></script>
        <script src="{{ asset('js/proposal/viewers4.js') }}"></script>
    @else
        <script src="{{ asset('LineControl/js/editor2.js') }}"></script>
        <script src="{{ asset('js/proposal/answers8.js') }}"></script>
    @endif
@endsection
