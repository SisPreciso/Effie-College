@extends('layouts.app')
@section('content')
    <div class="card-introduccion">
        <div class="card-introduccion__container">
            <h1 class="card-title">{{ __('Avance de propuesta del equipo ') }} {{ $user->username }}</h1>
            @if(Auth::user()->id === $user->id)
                <p class="cuerpo-gracias__contenido">{{ __('En esta sección podrás visualizar el avance de tus respuestas en cada sección de formulario de participación. Debes tener en cuenta las fechas claves establecidas en el cronograma del concurso a fin de enviar tu propuesta a tiempo.') }}</p>
            @else
                <p class="cuerpo-gracias__contenido">{{ __('En esta sección podrás visualizar el avance de las respuestas enviadas por el equipo en cada sección de formulario de participación.') }}</p>
            @endif
        </div>
    </div>
    <div class="ficha">
        <h1 class="card-title">{{ __('Formulario de participación') }}</h1>
        <div class="logo">
            <img src="{{ asset($user->caso->brand->image) }}" alt="{{ $user->caso->brand->name }}"
                 class="logo__proposal">
        </div>
        <h3 class="card-subtitle">{{ __('Información general') }}</h3>
        <div class="fila">
            <div class="columna columna-2 dato">
                <p>
                    <i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $questionTitleProposal->title }}</b>{{ ' (cód. '.$questionTitleProposal->code.')' }}
                </p>
            </div>
            <div class="columna columna-2 dato">
                @if($answerTitleProposal)
                    <i class="fa fa-check fa-icon"></i>
                @else
                    <i class="fa fa-close"></i>
                @endif
            </div>
        </div>
        @foreach($sections as $section)
            @foreach($section->questions as $question)
                <h3 class="card-subtitle">{{ $section->title }}</h3>
                <div class="fila">
                    <div class="columna columna-2 dato">
                        <p>
                            <i class="fa fa-puzzle-piece"></i>&nbsp;<b>{{ $question->title }}</b>{{ ' (cód. '.$question->code.')' }}
                        </p>
                    </div>
                    <div class="columna columna-2 dato">
                        @if(\Illuminate\Support\Str::contains($section->code, 'S5'))
                            @if(count($user->files))
                                <i class="fa fa-check fa-icon"></i>
                            @else
                                <i class="fa fa-close"></i>
                            @endif
                        @else
                            @if(\App\Answer::where('user_id', $user->id)->where('question_id', $question->id)->first())
                                <i class="fa fa-check fa-icon"></i>
                            @else
                                <i class="fa fa-close"></i>
                            @endif
                        @endif
                    </div>
                </div>
            @endforeach
        @endforeach
        <div class="space"></div>
        <h3 class="card-title">{{ __('Retroalimentación') }}</h3>
        <p class="cuerpo-gracias__contenido">{{ __('En esta sección podrás encontrar los comentarios enviados por los jurados de la marca al momento de la calificación del equipo.') }}</p>
        @foreach($user->reviewsLikeTeam as $review)
            @if($review->feedback)
                <textarea rows="5" disabled>{{ $review->feedback }}</textarea>
            @endif
        @endforeach
        <center>
            <a href="{{ URL::previous() }}" class="btn-effie-inv">
                <i class="fa fa-reply"></i>&nbsp;{{ __('Regresar') }}
            </a>
        </center>
    </div>
@endsection
