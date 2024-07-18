<!-- resources/views/questions/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Question</h1>
        <form action="{{ route('questions.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="chapter_id">Chapter</label>
                <select class="form-control" id="chapter_id" name="chapter_id" required>
                    @foreach ($chapters as $chapter)
                        <option value="{{ $chapter->id }}">{{ $chapter->name }}</option>
                    @endforeach
                </select>
            </div>
            @foreach ($languages as $language)
                <div class="form-group">
                    <label for="text_{{ $language->code }}">Text ({{ $language->name }})</label>
                    <input type="text" class="form-control" id="text_{{ $language->code }}"
                        name="translations[{{ $language->id }}]" required>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
