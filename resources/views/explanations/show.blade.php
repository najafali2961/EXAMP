@extends('layouts.user.app')

@section('content')
    <div class="container">
        <h1>{{ $question->text }}</h1>
        <ul>
            @foreach ($question->options as $option)
                <li>{{ $option->text }} @if ($option->is_correct)
                        <strong>(Correct)</strong>
                    @endif
                </li>
            @endforeach
        </ul>
        <h2>Explanation</h2>
        <p>{{ $question->explanation->text }}</p>
        <a href="{{ route('explanations.index', ['questionId' => $question->id]) }}" class="btn btn-info">View Explanation</a>
        <a href="{{ route('explanations.create', ['questionId' => $question->id]) }}" class="btn btn-primary">Add
            Explanation</a>
    </div>
@endsection
