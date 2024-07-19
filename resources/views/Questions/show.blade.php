<!-- resources/views/questions/show.blade.php -->
@extends('layouts.user.app')

@section('content')
    <div class="container">
        <h3>
            {!! nl2br(e($subject->name)) !!}
        </h3>
        <h3>
            {!! nl2br(e($chapter->name)) !!}
        </h3>
        <h3>
            {!! nl2br(e($$question->text)) !!}
        </h3>
        <ul>
            @foreach ($question->options as $option)
                <li>{{ $option->text }}
                    @if ($option->is_correct)
                        <strong>(Correct)</strong>
                    @endif
                </li>
            @endforeach
        </ul>
        <h4>Explanation</h4>
        <p>{{ $question->explanation->text ?? 'No explanation available.' }}</p>
        <!-- Navigation Buttons for Previous and Next Question -->
        <div class="d-flex justify-content-between mt-4">
            @if ($previousQuestion)
                <a href="{{ url('questions/' . $previousQuestion->id) }}" class="btn btn-primary">Previous Question</a>
            @endif
            @if ($nextQuestion)
                <a href="{{ url('questions/' . $nextQuestion->id) }}" class="btn btn-primary">Next Question</a>
            @endif
        </div>
    </div>
@endsection
