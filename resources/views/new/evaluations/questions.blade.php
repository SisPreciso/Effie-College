@php
    $ans1a = \App\Answer::where('user_id', $user->id)->where('question_id', $question->id)->first();
    $identifier = "{$number}{$value}";
@endphp
<div id="qst{{ $identifier }}" class="tabcontent" @if($value === 'a') style="display: block;" @endif>
    <div class="fila">
        <div class="columna columna-1">
            <label>{{ $question->code }}</label>
            <p>{{ $question->detail }}</p>
            <label>{{ $question->remark }}</label>
            <input type="hidden" id="ans{{ $identifier }}_detail" value="{{ $ans1a->detail ?? '' }}">
            <textarea id="ans{{ $identifier }}"></textarea>
            <br>
        </div>
    </div>
</div>
