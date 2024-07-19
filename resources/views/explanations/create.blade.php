@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Create Explanation
        </div>
        <div class="card-body">
            <form action="{{ route('explanations.store') }}" method="POST">
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
                        <label class="form-label" for="text_{{ $language->code }}">Explanation Text
                            ({{ $language->name }})
                        </label>
                        <textarea class="form-control" id="text_{{ $language->code }}" name="text_{{ $language->code }}" required></textarea>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
