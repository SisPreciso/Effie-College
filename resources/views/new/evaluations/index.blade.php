@extends('layouts.app')
@section('content')
    {{--    @inject('sections','App\Services\Sections')--}}
    {{--    @inject('answers','App\Services\Answers')--}}
    {{--    @php--}}
    {{--        $edition = $user->caso->edition->name;--}}
    {{--        $review = $user->reviewsByAuth->first();--}}
    {{--        $sect5 = $sections->get($edition.'S5');--}}
    {{--        $qst5b = $sect5->questions[1];--}}
    {{--        $ans5b = $answers->get($qst5b->code,$user->username);--}}
    {{--    @endphp--}}
    <div class="card-introduccion">
        <div class="card-introduccion__container">
            <h1 class="card-title">{{ $user->is_completed ? 'Propuesta enviada por el equipo ' : 'Avance de propuesta del equipo' }} {{ $user->username }}</h1>
            <p class="cuerpo-gracias__contenido">{{ __('Te presentamos el Formulario de Participación, el cual se compone de seis secciones. Cada una requiere textos, archivos y/o documentos que el equipo ha completado para continuar con el proceso de participación.') }}</p>
        </div>
    </div>
    <div class="ficha">
        <h1 class="card-title">{{ __('Formulario de participación') }}</h1>
        <div class="logo">
            <img src="{{ asset($user->caso->brand->image) }}" alt="{{ $user->caso->brand->name }}"
                 class="logo__proposal">
        </div>
        <div class="space"></div>
        @if (auth()->user()->situation != 'JURADO' && auth()->user()->situation != 'ADMINISTRADOR')
            <center>
                <p class="dato">{{ __('Descargar el caso') }}</p>
                <a href="{{ route('downloadWhole', ['edition' => $user->caso->edition->name, 'brand' => $user->caso->brand->name]) }}"
                   id="btn-whole"><i class="fa fa-download fa-2x"></i></a>
            </center>
        @endif
        <h1 class="card-title">{{ __('Información general') }}</h1>
        @include('evaluation/questions/question5b', ['qst5b' => $questionTitleProposal, 'ans5b' => $answerTitleProposal])
        <div class="space"></div>
        @if (auth()->user()->situation != 'JURADO' && auth()->user()->situation != 'ADMINISTRADOR')
            <div class="text-inscripcion">
                <p>{{ __('Puedes descargar aquí el formulario en formato Word') }}</p>
                <a href="{{ route('downloadForm', $user->caso->edition->name) }}"
                   class="btn-effie">{{ __('Descargar') }}</a>
            </div>
        @endif
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
    @php($review = $user->reviewsByAuth()->first())
    <div id="subtitle" class="ficha">
        @if(Auth::user()->situation === 'JURADO' && !Auth::user()->is_finished)
            <form method="POST" action="{{ route('sendScore', $user->id) }}" role="form">
                @csrf
                @endif
                @foreach($sections as $key => $section)
                    @include('new.evaluations.sections', ['section' => $section, 'number' => $key + 1])
                @endforeach
                <center>
                    @if(Auth::user()->situation === 'JURADO' && !Auth::user()->is_finished)
                        <button type="submit" class="btn-effie" style="width:170px">{{ __('Guardar notas') }}</button>
                        <a href="{{ route('home') }}" class="btn-effie-inv" style="width:170px"><i
                                class="fa fa-reply"></i>&nbsp;{{ __('Regresar') }}</a>
                </center>
            </form>
        @endif
    </div>
@endsection

@section('script')
    <link rel="stylesheet" href="{{ asset('css/proposal2.css') }}">
    <link rel="stylesheet" href="{{ asset('LineControl/css/editor.css') }}">
    <script src="{{ asset('js/new/proposals/questions.js') }}"></script>
    <script src="{{ asset('LineControl/js/viewer.js') }}"></script>
    <script src="{{ asset('js/new/proposals/viewers.js') }}"></script>
@endsection
