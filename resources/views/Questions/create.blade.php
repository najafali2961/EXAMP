<!-- resources/views/questions/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Create Question
        </div>
        <div class="card-body">
            <form action="{{ route('questions.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="chapter_id">Chapter</label>
                    <select class="form-select" id="chapter_id" name="chapter_id" required>
                        @foreach ($chapters as $chapter)
                            <option value="{{ $chapter->id }}">{{ $chapter->name }}</option>
                        @endforeach
                    </select>
                </div>
                @foreach ($languages as $language)
                    <div class="mb-3">
                        <label class="form-label" for="text_{{ $language->code }}">Text ({{ $language->name }})</label>
                        <input type="text" class="form-control" id="text_{{ $language->code }}"
                            name="translations[{{ $language->id }}]" required>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
