<!--questions/index.blade.php -->
@extends('layouts.user.app')

@section('content')
    <div class="container">
        <h3>
            {{-- {{ $subject->name }} --}}
             {!! nl2br(e( $subject->name )) !!}
        </h3>
        <h3>
            {{-- {{ $chapter->name }} --}}
              {!! nl2br(e($chapter->name )) !!}
        </h3>
        @foreach ($questions as $question)
            <div class="question mb-4">
                <h5>
                    {{-- {{ $question->text }} --}}
                    {!! nl2br(e($question->text)) !!}
                </h5>
                <ul class="list-group mb-3">
                    @foreach ($question->options as $option)
                        <li class="list-group-item">
                            <input type="radio" name="option_{{ $question->id }}" id="option_{{ $option->id }}">
                            <label for="option_{{ $option->id }}">
                                {{-- {{ $option->text }} --}}
                                {!! nl2br(e($option->text)) !!}
                            </label>
                        </li>
                    @endforeach
                </ul>
                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#explanationModal_{{ $question->id }}">
                    Explanation
                </button>
            </div>

            <!-- Explanation Modal -->
            <div class="modal fade" id="explanationModal_{{ $question->id }}" tabindex="-1"
                aria-labelledby="explanationModalLabel_{{ $question->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="explanationModalLabel_{{ $question->id }}">Explanation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{-- {{ $question->explanation->text }} --}}
                            {!! nl2br(e($question->explanation->text)) !!}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center align-items-center mt-4">
            {{ $questions->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
