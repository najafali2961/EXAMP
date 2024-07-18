@extends('layouts.user.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Subjects</h1>
        <div class="list-group">
            @foreach ($subjects as $subject)
                <a href="{{ url('subjects/' . $subject->id . '/chapters') }}" class="list-group-item list-group-item-action">
                    {{ $subject->name }}
                </a>
            @endforeach
        </div>
    </div>
@endsection
