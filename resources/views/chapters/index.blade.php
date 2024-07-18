@extends('layouts.user.app')

@section('content')
    <div class="container">
        <h3 class="my-4">{{ $subject->name }}</h3>
        <div class="list-group">
            @foreach ($chapters as $chapter)
                <a href="{{ url('chapters/' . $chapter->id . '/questions') }}" class="list-group-item list-group-item-action">
                    {{ $chapter->name }}
                </a>
            @endforeach
        </div>
    </div>
@endsection
