@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Explanations</h1>
        <ul>
            @foreach ($explanations as $explanation)
                <li>
                    {{ $explanation->question->text }}: {{ $explanation->statement->text }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection
