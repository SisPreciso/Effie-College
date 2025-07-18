@extends('layouts.app')
@section('content')
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
        @include('new.proposals.title')
        <div class="space"></div>
        <div class="text-inscripcion">
            <p>{{ __('Puedes descargar aquí el formulario en formato Word') }}</p>
            <a href="{{ route('downloadForm', $user->caso->edition->name) }}" class="btn-effie">
                {{ __('Descargar') }}
            </a>
        </div>
        <div style="background: #f3f3f3;border-left: 5px solid #bd9e56;margin-bottom: 30px;padding: 20px;">
            <p><b>Feedback</b></p>
            <ul>
            @php $i = 1; @endphp
            @foreach ($user->reviewsLikeJury as $review)
                @if(!empty($review->feedback))
                    <li><b>Jurado #{{ $i }} : </b>{{$review->feedback }}</li>
                    @php $i++; @endphp
                @endif
            @endforeach
            </ul>
        </div>
        
    </div>
    <div class="card-introduccion">
        <div class="card-introduccion__container">
            <h1 class="card-title">{{ __('Secciones') }}</h1>
        </div>
        <div class="sections">
            @foreach($sections as $index => $section)
                <span onclick="openSection({{ $index }})" class="step {{ $index === 0 ? 'active' : '' }}">
                    {{ $index + 1 }}
                </span>
            @endforeach
        </div>
        <br>
        <br>
    </div>
    <input type="hidden" name="data" id="data" value="{{ collect($data) }}">
    <div id="subtitle" class="ficha">
        @foreach($sections as $index => $section)
            @include('new.proposals.sections', ['section' => $section, 'number' => $index + 1])
        @endforeach
    </div>
    <div class="space"></div>
@endsection

@include('popups/message')
@include('popups/history')

@section('script')
    <link rel="stylesheet" href="{{ asset('css/proposal2.css') }}">
    <link rel="stylesheet" href="{{ asset('LineControl/css/editor.css') }}">
    {{--    <link rel="stylesheet" href="{{ asset('line-control/editor.css') }}">--}}
    {{--    <script src="{{ asset('js/proposal/questions2.js') }}"></script>--}}
    <script src="{{ asset('js/new/proposals/questions.js') }}"></script>
    {{--    <script src="{{ asset('js/proposal/files5.js') }}"></script>--}}
    <script src="{{ asset('js/new/proposals/files.js') }}"></script>
    @if($user->is_completed)
        <script src="{{ asset('LineControl/js/viewer.js') }}"></script>
        <script src="{{ asset('js/new/proposals/viewers.js') }}"></script>
    @else
        <script src="{{ asset('LineControl/js/editor2.js') }}"></script>
        {{--        <script src="{{ asset('line-control/editor.js') }}"></script>--}}
        {{--        <script src="{{ asset('js/proposal/answers8.js') }}"></script>--}}
        <script src="{{ asset('js/new/proposals/answers1.js') }}"></script>
    @endif
@endsection
