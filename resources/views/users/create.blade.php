@extends('layouts.app')
@section('content')
    <div class="card-introduccion">
        <div class="card-introduccion__container">
            <h1 class="card-title">{{ __('¡Bienvenido a Effie College 2024!') }}</h1>
            <!--h1 class="card-title">{{ __('¡Bienvenido a Effie College ' . now()->year . '!') }}</h1-->
            <p class="cuerpo-gracias__contenido">{{ __('Para inscribirte, primero selecciona la marca para la cual participarás.') }}</p>
            <p class="cuerpo-gracias__contenido">{{ __('A continuación, completa el formulario que aparece abajo. Antes de enviarlo asegúrate de completar cada sección, guíate de las ') }}
                <b><a href="https://effie-peru.com/kit-de-participacion-effie-college/"
                      style="color:#777;text-decoration:underline"
                      target="_blank">{{ __('bases del concurso') }}</a></b>{{ __(', y confirma que todos los datos que has incluido sean correctos, ya que serán utilizados durante todo el proceso del concurso. ') }}<b>{{ __('Tienes plazo para inscribirte hasta el 20 de septiembre a las 23:59 horas.') }}</b>
            </p>
            <p class="cuerpo-gracias__contenido">{{__('Como parte final de la inscripción de tu equipo, enviaremos toda la información a tu universidad/instituto para que esta la valide.')}}</p>
        </div>
    </div>
    <div class="ficha"><h1 class="card-title">{{ __('Ficha de inscripción') }}</h1>
        <div class="formulario-inscripcion">
            <form method="POST" action="{{ route('register') }}" role="form" id="frm-user">@csrf
                <label>{{ __('Elige la marca sobre la que tu equipo va a desarrollar la campaña.') }}</label>
                @inject('casos', 'App\Services\Casos')
                <div class="logo">
                    @foreach ($casos->get(date('Y')) as $index => $caso)
                        <button type="button" class="btn-img" name="{{ $index }}" value="{{ $caso['brand'] }}"
                                onclick="selectCaso(this)" id="paint{{ $caso['id'] }}"><img
                                src="{{ asset($caso['image']) }}" alt="{{ $caso['brand'] }}" class="logo__image">
                        </button> <!-- Desafío Marca -->
                        <input type="hidden" name="challenge_caso"
                               id="challenge{{ $caso['id'] }}"
                               value="{{ $caso['description'] }}">
                        <input type="hidden" name="group_caso" id="group{{ $caso['id'] }}"
                               value="{{ $caso['groups_count'] }}">
                    @endforeach
                </div><!-- Desafíos de Marcas -->
                <div class="display-none"
                     style="margin: 1.5rem 0; padding: 1rem 1.5rem; border: 1px solid var(--color-dorado); border-radius: 10px; background: #bd9e561c; line-height: 1.5em;"
                     id="text_content"><strong id="title_brand"></strong>: <span id="text_brand"></span></div>
                <h3 class="card-subtitle">{{ __('Datos generales') }}</h3>
                <div class="fila">
                    <div class="columna columna-3">
                        <label>{{ __('Institución educativa*') }}</label>
                        @inject('colleges', 'App\Services\Colleges')
                        <select name="college_id" id="college_id" required>
                            <option selected disabled hidden
                                    value="">{{ __(' -- Elige una opción -- ') }}</option>@foreach ($colleges->get() as $index => $college)
                                <option
                                    value="{{ $index }}" {{ old('college_id') == $index ? 'selected' : '' }}>{{ $college }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="columna columna-3"><label>{{ __('Facultad / Escuela*') }}</label>
                        <input type="text"
                               name="school"
                               id="school"
                               maxlength="50"
                               value="{{ old('school') }}"
                               required></div>
                    <div class="columna columna-3"><label>{{ __('Marca elegida') }}</label>
                        <input type="text"
                               name="brand"
                               id="brand"
                               value="{{ old('brand') }}"
                               style="background-color:#E5E7E9"
                               disabled>
                        <input type="hidden" name="caso_id" id="caso_id" value="{{ old('caso_id') }}">
                    </div>
                </div>
                <div class="space"></div>
                <h3 class="card-subtitle">{{ __('Datos del tutor') }}</h3>
                <div class="fila">
                    <div class="columna columna-3"><label>{{ __('Nombres*') }}</label>
                        <input type="text"
                               name="teacher_name"
                               id="teacher_name"
                               maxlength="50"
                               value="{{ old('teacher_name') }}"
                               onkeypress="return checkName(event)"
                               required></div>
                    <div class="columna columna-3"><label>{{ __('Apellidos*') }}</label>
                        <input type="text"
                               name="teacher_lastname"
                               id="teacher_lastname"
                               maxlength="50"
                               value="{{ old('teacher_lastname') }}"
                               onkeypress="return checkName(event)"
                               required></div>
                    <div class="columna columna-3"><label>{{ __('Correo institucional*') }}</label>
                        <input type="email"
                               name="teacher_email"
                               id="teacher_email"
                               maxlength="50"
                               value="{{ old('teacher_email') }}"
                               onkeypress="return checkEmail(event)"
                               pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                               required>
                    </div>
                </div>
                <div class="fila">
                    <div class="columna columna-3">
                        <label>{{ __('Tipo de documento*') }}</label>
                        @inject('documentTypes', 'App\Services\DocumentTypes')
                        <select name="teacher_document_type_id" id="teacher_document_type_id" required>
                            <option selected disabled hidden
                                    value="">{{ __(' -- Elige una opción -- ') }}</option>
                            @foreach ($documentTypes->get() as $index => $documentType)
                                <option
                                    value="{{ $index }}"{{ old('teacher_document_type_id') == $index ? 'selected' : '' }}>{{ $documentType }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="columna columna-6"><label>{{ __('N° Documento*') }}</label>
                        <input type="hidden"
                               name="teacher_pattern"
                               id="teacher_pattern"
                               value="{{ old('teacher_pattern') }}"><input
                            type="text" name="teacher_document" id="teacher_document"
                            value="{{ old('teacher_document') }}" maxlength="15" onkeyup="return mayusculas(this)"
                            required></div>
                    <div class="columna columna-6"><label>{{ __('Número celular*') }}</label>
                        <input type="tel"
                               name="teacher_mobile"
                               id="teacher_mobile"
                               maxlength="11"
                               value="{{ old('teacher_mobile') }}"
                               onkeypress="return checkNumber(event)"
                               required></div>
                    <div class="columna columna-3"><label>{{ __('Profesión / Especialidad*') }}</label>
                        <input
                            type="text" name="teacher_profession" id="teacher_profession" maxlength="50"
                            value="{{ old('teacher_profession') }}" onkeypress="return checkText(event)" required>
                    </div>
                </div>
            </form>
        </div>
        <div class="space"></div>
        <h3 id="subtitle" class="card-subtitle">{{ __('Agregar alumno') }}</h3>
        <div class="formulario-inscripcion">
            <form method="POST" action="{{ action('StudentController@store') }}" role="form" id="frm-student">@csrf
                <div class="fila">
                    <div class="columna columna-3"><label>{{ __('Nombres*') }}</label>
                        <input type="text"
                               name="student_name"
                               id="student_name"
                               maxlength="50"
                               value="{{ old('student_name') }}"
                               onkeypress="return checkName(event)"
                               required></div>
                    <div class="columna columna-3"><label>{{ __('Apellidos*') }}</label>
                        <input type="text"
                               name="student_lastname"
                               id="student_lastname"
                               maxlength="50"
                               value="{{ old('student_lastname') }}"
                               onkeypress="return checkName(event)"
                               required></div>
                    <div class="columna columna-3"><label>{{ __('Correo institucional*') }}</label>
                        <input type="email"
                               name="student_email"
                               id="student_email"
                               maxlength="50"
                               value="{{ old('student_email') }}"
                               onkeypress="return checkEmail(event)"
                               pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                               required>
                    </div>
                </div>
                <div class="fila">
                    <div class="columna columna-3">
                        <label>{{ __('Tipo de documento*') }}</label>
                        @inject('documentTypes', 'App\Services\DocumentTypes')
                        <select name="student_document_type_id" id="student_document_type_id" required>
                            <option selected disabled hidden
                                    value="">{{ __(' -- Elige una opción -- ') }}</option>
                            @foreach ($documentTypes->get() as $index => $documentType)
                                <option
                                    value="{{ $index }}"{{ old('student_document_type_id') == $index ? 'selected' : '' }}>{{ $documentType }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="columna columna-6"><label>{{ __('N° Documento*') }}</label>
                        <input type="hidden"
                               name="student_pattern"
                               id="student_pattern"
                               value="{{ old('student_pattern') }}"><input
                            type="text" name="student_document" id="student_document"
                            value="{{ old('student_document') }}" maxlength="15" onkeyup="return mayusculas(this)"
                            required></div>
                    <div class="columna columna-6"><label>{{ __('Número celular*') }}</label>
                        <input type="tel"
                               name="student_mobile"
                               id="student_mobile"
                               maxlength="11"
                               value="{{ old('student_mobile') }}"
                               onkeypress="return checkNumber(event)"
                               required></div>
                    <div class="columna columna-3">
                        <label>{{ __('Especialidad*') }}</label>
                        @inject('careers', 'App\Services\Careers')
                        <select
                            name="student_career_id" id="student_career_id" required>
                            <option selected disabled hidden
                                    value="">{{ __(' -- Elige una opción -- ') }}</option>@foreach ($careers->get() as $index => $career)
                                <option
                                    value="{{ $index }}"{{ old('student_career_id') == $index ? 'selected' : '' }}>{{ $career }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="fila">
                    <div class="columna columna-3">
                        <label>{{ __('Ciclo actual*') }}</label>
                        @inject('cycles', 'App\Services\Cycles')
                        <select
                            name="student_cycle_id" id="student_cycle_id" required>
                            <option selected disabled hidden
                                    value="">{{ __(' -- Elige una opción -- ') }}</option>@foreach ($cycles->get() as $index => $cycle)
                                <option
                                    value="{{ $index }}"{{ old('student_cycle_id') == $index ? 'selected' : '' }}>{{ $cycle }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="columna columna-3"><br></div>
                    <div class="columna columna-3">
                        <center>
                            <button id="submit" type="submit" class="btn-effie"
                                    style="margin:16px 0px">{{ __('Agregar') }}</button>
                            <a onclick="clearForm()" class="btn-effie-inv"
                               style="margin:16px 0px;width:150px">{{ __('Limpiar') }}</a></center>
                    </div>
                </div>
                <div class="span-fail" id="fail-div"><span id="fail-msg"></span></div>
            </form>
        </div>
        <div class="space"></div><!-- Parráfo de máximo de egresados -->
        <!--div class="fila">
            <div class="columna columna-1">
                <label>
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    Ten en cuenta que solo se acepta 1 egresado como máximo en los equipos de 3 o 4 integrantes, y 2
                    egresados como máximo en equipos de 5 integrantes.
                </label>
            </div>
        </div-->
        <div class="space"></div>
        <h3 class="card-title">{{ __('Alumnos inscritos') }}</h3>
        <div class="table-overflow">
            <table id="tbl-students" class="tablealumno">
                <thead>
                <th width="20%">{{ __('Nombre completo') }}</th>
                <th width="15%">{{ __('N° Documento') }}</th>
                <th width="15%">{{ __('Correo') }}</th>
                <th width="15%">{{ __('Celular') }}</th>
                <th width="15%">{{ __('Carrera') }}</th>
                <th width="10%">{{ __('Ciclo') }}</th>
                <th width="5%">{{ __('Editar') }}</th>
                <th width="5%">{{ __('Borrar') }}</th>
                </thead>
                <tbody>
                @foreach ($students as $index => $student)
                    <tr>
                        <td>{{ $student['student_name'] . ' ' . $student['student_lastname'] }}</td>
                        <td>
                            <center>{{ $student['student_document'] }}</center>
                        </td>
                        <td>
                            <center>{{ $student['student_email'] }}</center>
                        </td>
                        <td>
                            <center>{{ $student['student_mobile'] }}</center>
                        </td>
                        <td>
                            <center>{{ $student['student_career'] }}</center>
                        </td>
                        <td>
                            <center>{{ $student['student_cycle'] }}</center>
                        </td>
                        <td>
                            <center><a name="{{ $index }}" onclick="editStudent(this)"><i class="fa fa-edit"></i></a>
                            </center>
                        </td>
                        <td>
                            <center><a name="{{ $index }}" onclick="removeStudent(this)"><i class="fa fa-trash"></i></a>
                            </center>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="space"></div>
        <div class="fila">
            <div class="columna columna-1">
                <label>
                    <i class="fa fa-exclamation-triangle fa-2x fa-icon"
                       aria-hidden="true"></i>&nbsp;{{ __('Antes de inscribirte, debes leer y aceptar los ') }}
                    <a id="lnk-terminos" class="btnpopup">{{ __('Términos de uso') }}</a>
                    {{ __(' y la ') }}
                    <a id="lnk-politicas" class="btnpopup">{{ __('Política de privacidad') }}</a>
                    {{ __(' de © ' ) . now()->year . __(' Effie® College.') }}
                </label>
            </div>
        </div>
        <div class="space"></div>
        <div class="fila">
            <div class="columna columna-1">
                <center>
                    <button type="submit" id="btn-submit" class="btn-effie"
                            onclick="document.getElementById('frm-user').submit();"
                            disabled>{{ __('Inscribirme') }}</button>
                </center>
            </div>
        </div>
        <div class="space"></div>
        <div class="fila">
            <div class="columna columna-1">
                <p>
                    <i class="fa fa-info-circle fa-icon" aria-hidden="true"></i>&nbsp;
                    <b>{{ __('Importante') }}</b>
                </p>
                <ul>
                    <li>{{ __('(*) Campos obligatorios.') }}</li>
                    <li>{{ __('El tamaño máximo del nombre, apellido, correo institucional y profesión/especialidad es cincuenta (50) caracteres.') }}</li>
                    <li>{{ __('Para cancelar la inserción o edición de datos de un alumno presiona el botón "Limpiar".') }}</li>
                    <li>{{ __('Una vez que hayas completado todos los datos solicitados presiona el botón "Inscribirme".') }}</li>
                    <li>{{ __('Una vez inscrito solo el tutor podrá hacer modificaciones de la información, agregar o quitar integrantes.') }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@include('popups/terminos')
@include('popups/politicas')
@section('script')
    <script src="{{ asset('js/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('js/students/create4.js') }}"></script>
    <script src="{{ asset('js/users/create2.js') }}"></script>
@endsection
