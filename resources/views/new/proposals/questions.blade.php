@php
    $ans1a = \App\Answer::where('user_id', auth()->id())->where('question_id', $question->id)->first();
    $identifier = "{$number}{$value}";
@endphp
<div id="qst{{ $identifier }}" class="tabcontent" @if($value === 'a') style="display: block;" @endif>
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $question->code }}</label>
            <p>{{ $question->detail }}</p>
            <label>{{ $question->remark }}</label>
            <input type="hidden" id="ans{{ $identifier }}_method" value="{{ $ans1a ? 'PATCH' : '' }}">
                <input type="hidden" id="ans{{ $identifier }}_detail" value="{{ $ans1a->detail ?? '' }}">
                <input type="hidden" id="ans{{ $identifier }}_id" value="{{ $ans1a->id ?? '' }}">
                <textarea class="ans-editor" id="ans{{ $identifier }}"></textarea>
                <a class="btnhistory" id="btn{{ $identifier }}-hist"
                   onclick="showHistory({{ $identifier }})">
                    <i class="fa fa-history"></i>&nbsp;
                    {{ __('Revisar historial de cambios') }}
                </a>
            <!--@if($user->is_completed)
                <input type="hidden" id="ans{{ $identifier }}_method" value="{{ $ans1a ? 'PATCH' : '' }}">
                <input type="hidden" id="ans{{ $identifier }}_detail" value="{{ $ans1a->detail ?? '' }}">
                <input type="hidden" id="ans{{ $identifier }}_id" value="{{ $ans1a->id ?? '' }}">
                <textarea class="ans-editor" id="ans{{ $identifier }}"></textarea>
                <a class="btnhistory" id="btn{{ $identifier }}-hist"
                   onclick="showHistory({{ $identifier }})">
                    <i class="fa fa-history"></i>&nbsp;
                    {{ __('Revisar historial de cambios') }}
                </a>
            @else
                <form method="POST" action="{{ $ans1a ? route('answers.update', $ans1a->id) : route('answers.store') }}"
                      role="form" id="frm-ans{{ $identifier }}">
                    @csrf
                    <input type="hidden" id="ans{{ $identifier }}_method" value="{{ $ans1a ? 'PATCH' : '' }}">
                    <input type="hidden" name="test" id="ans{{ $identifier }}_detail"
                           value="{{ $ans1a->detail ?? '' }}">
                    <input type="hidden" id="qst{{ $identifier }}_maxwrd" value="{{ $question->maxwrd }}">
                    <input type="hidden" id="qst{{ $identifier }}_maxgrp" value="{{ $question->maxgrp }}">
                    <input type="hidden" id="ans{{ $identifier }}_id" value="{{ $ans1a->id ?? '' }}">
                    <input type="hidden" id="qst{{ $identifier }}_id" value="{{ $question->id }}">
                    <div class="span-done" id="ans{{ $identifier }}-done-div">
                        <span id="ans{{ $identifier }}-done-msg"></span>
                    </div>
                    <div class="span-fail" id="ans{{ $identifier }}-fail-div">
                        <span id="ans{{ $identifier }}-fail-msg"></span>
                    </div>
                    <textarea class="ans-editor" id="ans{{ $identifier }}"></textarea>
                    <a class="btnhistory" id="btn{{ $identifier }}-hist" onclick="showHistory({{ $identifier }})">
                        <i class="fa fa-history"></i>&nbsp;
                        {{ __('Revisar historial de cambios') }}
                    </a>
                    <button type="button" id="btn{{ $identifier }}-canc" class="btn-effie-inv edt"
                            onclick="disableEditor('{{ $identifier }}')">
                        {{ __('Cancelar') }}
                    </button>
                    <button type="button" id="btn{{ $identifier }}-edit" class="btn-effie edt"
                            onclick="enableEditor('{{ $identifier }}')">
                        {{ __('Editar') }}
                    </button>
                    <button type="submit" id="btn{{ $identifier }}-save" class="btn-effie edt"
                            onclick="sendAnswer(event, '{{ $identifier }}')">
                        {{ __('Guardar') }}
                    </button>
                </form>
            @endif-->
        </div>
    </div>
</div>
