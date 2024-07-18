{{-- <!-- resources/views/chapters/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Create Chapter</h1>
        <form action="{{ route('chapters.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="subject_id">Subject</label>
                <select class="form-control" id="subject_id" name="subject_id" required>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name_en">Name (English)</label>
                <input type="text" class="form-control" id="name_en" name="name_en" required>
            </div>
            <div class="form-group">
                <label for="name_es">Name (Spanish)</label>
                <input type="text" class="form-control" id="name_es" name="name_es" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection --}}
<!-- resources/views/chapters/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Create Chapter</h1>
        <form action="{{ route('chapters.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="subject_id">Subject</label>
                <select class="form-control" id="subject_id" name="subject_id" required>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>
            @foreach ($languages as $language)
                <div class="form-group">
                    <label for="name_{{ $language->code }}">Name ({{ $language->name }})</label>
                    <input type="text" class="form-control" id="name_{{ $language->code }}"
                        name="translations[{{ $language->id }}]" required>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
