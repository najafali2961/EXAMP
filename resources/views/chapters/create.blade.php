<!-- resources/views/chapters/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Create Chapter
        </div>
        <div class="card-body">
            <form action="{{ route('chapters.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="subject_id">Subject</label>
                    <select class="form-select" id="subject_id" name="subject_id" required>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
                @foreach ($languages as $language)
                    <div class="mb-3">
                        <label class="form-label" for="name_{{ $language->code }}">Name ({{ $language->name }})</label>
                        <input type="text" class="form-control" id="name_{{ $language->code }}"
                            name="translations[{{ $language->id }}]" required>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
