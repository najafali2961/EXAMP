<!-- resources/views/options/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Create Option
        </div>
        <div class="card-body">
            <form action="{{ route('options.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="question_id">Select Question</label>
                    <select class="form-select" id="question_id" name="question_id" required>
                        @foreach ($questions as $question)
                            <option value="{{ $question->id }}">
                                {{ $question->statements->first()->text ?? 'No text available' }}
                            </option>
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
                <div class="mb-3">
                    <label class="form-label" for="is_correct">Is Correct</label>
                    <select class="form-select" id="is_correct" name="is_correct" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
