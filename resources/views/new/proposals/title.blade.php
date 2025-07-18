<div class="fila dato">
    <div class="columna columna-4">
        <p><i class="fa fa-briefcase"></i>&nbsp;{{ "{$questionTitleProposal->title}:" }}</p>
        <label>{{ "({$questionTitleProposal->code})" }}</label>
    </div>
    <div class="columna columna-2">
        <form method="POST"
              action="{{ $answerTitleProposal ? route('updateTitle', $answerTitleProposal->id) : route('storeTitle') }}"
              role="form" id="frm-ans5b">
            @csrf
            <div class="columna columna-10c">
                <input type="hidden" id="ans5b_method"
                       value="{{ $answerTitleProposal ? 'PATCH' : '' }}">
                <input
                    type="hidden" id="ans5b_detail" value="{{ $answerTitleProposal->detail ?? '' }}">
                <input
                    type="hidden" id="ans5b_id" value="{{ $answerTitleProposal->id ?? '' }}">
                <input type="hidden"
                       id="qst5b_id"
                       value="{{ $questionTitleProposal->id }}">
                <input
                    type="text" id="ans5b" value="{{ old('ans5b', $answerTitleProposal->detail ?? '') }}"
                    maxlength="{{ $questionTitleProposal->maxwrd }}" @if($user->is_completed) disabled @endif>
                <a
                    class="btnhistory" id="btn5b-hist" onclick="showHistory('5b')">
                    <i
                        class="fa fa-history"></i>&nbsp;{{ __('Revisar historial de cambios') }}
                </a>
            </div>
            <!--@if(!$user->is_completed)
                <div class="columna columna-10">
                    <a type="submit" onclick="sendTitle(event, '5b')"><i
                            class="fa fa-save fa-2x fa-icon"></i></a>
                </div>
            @endif-->
        </form>
    </div>
    <div class="columna columna-4">
        <a href="{{ route('myAdvance') }}" class="btn-effie-inv"
           style="width:200px;float:right;margin:0">{{ __('Revisar mi avance') }}</a>
    </div>
</div>
<div class="fila dato">
    <div class="columna columna-1">
        <p><i class="fa fa-info-circle"></i>&nbsp;{{ $questionTitleProposal->detail }}</p>
    </div>
</div>
<div class="span-done" id="ans5b-done-div"><span id="ans5b-done-msg"></span></div>
<div class="span-fail" id="ans5b-fail-div"><span id="ans5b-fail-msg"></span></div>
