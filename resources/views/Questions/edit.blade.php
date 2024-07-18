@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Question</h1>
        <form method="POST" action="{{ route('questions.update', $question->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="chapter_id">Chapter</label>
                <select class="form-control" id="chapter_id" name="chapter_id" required>
                    @foreach ($chapters as $chapter)
                        <option value="{{ $chapter->id }}" {{ $question->chapter_id == $chapter->id ? 'selected' : '' }}>
                            {{ $chapter->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="text_en">Question Text (English)</label>
                <input type="text" class="form-control" id="text_en" name="text_en"
                    value="{{ App\Helpers\TextHelper::getText('question', $question->id, 1) }}" required>
            </div>

            <div class="form-group">
                <label for="text_es">Question Text (Spanish)</label>
                <input type="text" class="form-control" id="text_es" name="text_es"
                    value="{{ App\Helpers\TextHelper::getText('question', $question->id, 2) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('questions.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
