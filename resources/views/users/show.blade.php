@extends('layouts.app')
@section('content')
<div class="ficha">
    <h1 class="card-title">{{ __('Equipo') }} {{ $user->username }}</h1>
    <h3 class="card-subtitle">{{ __('Datos generales') }}</h3>
    <div class="fila">
        <div class="columna columna-3 dato">
            <p><i class="fa fa-university"></i>&nbsp;
                <b>{{ __('Institución educativa: ') }}</b>{{ $user->college->name }}
            </p>
        </div>
        <div class="columna columna-3 dato">
            <p><i class="fa fa-graduation-cap"></i>&nbsp;
                <b>{{ __('Escuela / Facultad: ') }}</b>{{ $user->school }}
            </p>
        </div>
        <div class="columna columna-3 dato">
            <p><i class="fa fa-check-circle"></i>&nbsp;
                <b>{{ __('Marca elegida: ') }}</b>{{ $user->caso->brand->name }}
            </p>
        </div>
    </div>
    <div class="fila">
        <div class="columna columna-3 dato">
            <p><i class="fa fa-calendar"></i>&nbsp;
                <b>{{ __('Fecha de inscripción: ') }}</b>{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}
            </p>
        </div>
        <div class="columna columna-3 dato">
            <p><i class="fa fa-tag"></i>&nbsp;
                <b>{{ __('Situación: ') }}</b>{{ $user->situation }}
            </p>
        </div>
        <div class="columna columna-3"></div>
    </div>
    <div class="space"></div>
    <h3 class="card-subtitle">{{ __('Datos del tutor') }}</h3>
    <div class="fila">
        <div class="columna columna-3 dato">
            <p><i class="fa fa-user"></i>&nbsp;
                <b>{{ __('Nombre completo: ') }}</b>{{ $user->teacher->teacher_name.' '.$user->teacher->teacher_lastname }}
            </p>
        </div>
        <div class="columna columna-3 dato">
            <p><i class="fa fa-address-book"></i>&nbsp;
                <b>{{ __('Tipo de documento: ') }}</b>{{ $user->teacher->documentType->name }}
            </p>
        </div>
        <div class="columna columna-3 dato">
            <p><i class="fa fa-id-card"></i>&nbsp;
                <b>{{ __('N° Documento: ') }}</b>{{ $user->teacher->teacher_document }}
            </p>
        </div>
    </div>
    <div class="fila">
        <div class="columna columna-3 dato">
            <p><i class="fa fa-envelope"></i>&nbsp;
                <b>{{ __('Correo institucional: ') }}</b><a href="mailto:{{ $user->teacher->teacher_email }}">{{ $user->teacher->teacher_email }}</a>
            </p>
        </div>
        <div class="columna columna-3 dato">
            <p><i class="fa fa-phone"></i>&nbsp;
                <b>{{ __('Número celular: ') }}</b>{{ $user->teacher->teacher_mobile }}
            </p>
        </div>
        <div class="columna columna-3 dato">
            <p><i class="fa fa-briefcase"></i>&nbsp;
                <b>{{ __('Profesión / Especialidad: ') }}</b>{{ $user->teacher->teacher_profession }}
            </p>
        </div>
    </div>
    <div class="space"></div>
    <h3 class="card-subtitle">{{ __('Alumnos inscritos') }}</h3>
    <table class="tablealumno">
        <thead>
            <th width="20%">{{ __('Nombre completo') }}</th>
            <th width="15%">{{ __('Tipo de documento') }}</th>
            <th width="15%">{{ __('N° Documento') }}</th>
            <th width="15%">{{ __('Correo') }}</th>
            <th width="15%">{{ __('Celular') }}</th>
            <th width="10%">{{ __('Carrera') }}</th>
            <th width="10%">{{ __('Ciclo') }}</th>
        </thead>
        <tbody>
            @foreach ($user->students as $student)
            <tr>
                <td>{{ $student->student_name.' '.$student->student_lastname }}</td>
                <td><center>{{ $student->documentType->name }}</center></td>
                <td><center>{{ $student->student_document }}</center></td>
                <td><center><a href="mailto:{{ $student->student_email }}">{{ $student->student_email }}</a></center></td>
                <td><center>{{ $student->student_mobile }}</center></td>
                <td><center>{{ $student->career->name }}</center></td>
                <td><center>{{ $student->cycle->name }}</center></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="space"></div>
    <h3 class="card-title">{{ __('Propuesta para la marca') }}</h3>
    <div class="text-inscripcion">
        <img src="{{ asset($user->caso->brand->image) }}" alt="{{ $user->caso->brand->name }}" style="width:200px;height:auto">
        @if ($user->is_completed)
        <a href="{{ url('admin/evaluation',$user->id) }}" class="btn-effie" style="width: 180px;">{{ __('Ver Propuesta') }}</a>
        @else
        <p>{{ __('El equipo aún no ha enviado su propuesta.') }}</p>
        @endif
    </div>
    @if ($info_team->count())
        <p>
            <b>Feedback:</b>
            @foreach ($info_team as $team)
                {{ $team->feedback }}
            @endforeach
        </p>
    @endif
    <div class="fila">
        <div class="columna columna-1">
            <center>
            <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn-effie">{{ __('Editar') }}</a>
            <a href="{{ url('admin/home') }}" class="btn-effie-inv">{{ __('Regresar') }}</a>
            </center>
        </div>
    </div>
    <div class="space"></div>
</div>
@endsection