<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Caso del Equipo: {{ $user->username }}</title>
    <style>
        *,
        *:before,
        *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        
        body {
            margin: 0;
        }

        .section-golden {
            background-color: #bd9e56;
            color: white;
            font-weight: bold;
            margin-top: 20px;
            padding: 1px 10px 1px 10px;
        }

        table {
            width: 700px;
        }

        table,
        th,
        td {
            border-collapse: collapse;
            border: 1px solid black;
        }

        th {
            text-align: left;
        }

        .border-title {
            background-color: #b8b8b8;
            border: 1px solid black;
            font-weight: bold;
            margin-top: 20px;
            padding: 0 10px 0 10px;
        }

        small {
            font-weight: normal;
        }

        .border-body {
            border: 1px solid black;
            padding: 0 10px 0 10px;
        }

        img {
            width: 80%;
        }
    </style>
</head>

<body>
    <h2 class="section-golden">INFORMACIÓN GENERAL</h2>
    <table>
        <thead></thead>
        <tbody>
            <tr>
                <th>ID INSCRIPCIÓN</th>
                <td>{{ $user->username }}</td>
            </tr>
            <tr>
                <th>TÍTULO DE LA PROPUESTA</th>
                <td>
                    @if ($user->answers->count())
                        @foreach ($user->answers as $answer)
                            @if ($answer->question)
                                @if (strpos($answer->question->code, 'TTL') !== false)
                                    {{ $answer->detail ?? 'Aún no ha escrito su título de propuesta' }}
                                @endif
                            @endif
                        @endforeach
                    @else
                        Aún no ha escrito su título de propuesta
                    @endif
                </td>
            </tr>
            <tr>
                <th>MARCA AUSPICIADORA</th>
                <td>{{ $user->caso->brand->name }}</td>
            </tr>
        </tbody>
    </table>
    <div>
        @if ($user->caso->edition->sections->count())
            @foreach ($user->caso->edition->sections as $section)
                @for ($i = 1; $i < $user->caso->edition->sections->count(); $i++)
                    @if (strpos($section->code, "S$i") !== false)
                        <div class="section-golden">
                            <h3>{{ $section->title }}</h3>
                            <p>{{ $section->description }}</p>
                        </div>
                        @foreach ($section->questions as $question)
                            <div class="border-title">
                                <p>{{ substr($question->code, -2, 2) }}. {{ $question->title }}</p>
                                <p>{{ $question->detail }} <small>{{ $question->remark }}</small></p>
                            </div>
                            <div class="border-body">
                                <p>Respuesta:</p>
                                @if ($user->answers->count())
                                    @foreach ($user->answers as $answer)
                                        @if ($answer->question_id === $question->id)
                                            <div>
                                                @php
                                                    $answer_detail = str_replace('pre-wrap', 'no-wrap', $answer->detail);
                                                @endphp
                                                {!! $answer_detail !!}
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    Aún no ha escrito su respuesta.
                                @endif
                            </div>
                        @endforeach
                    @endif
                @endfor
            @endforeach
        @endif
    </div>
</body>

</html>
