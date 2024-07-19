{{-- @extends('layouts.user.app')

@section('content')
    <div class="container">
        <h3>{!! nl2br(e($subject->name ?? 'Subject name not found')) !!}</h3>
        <h3>{!! nl2br(e($chapter->name ?? 'Chapter name not found')) !!}</h3>

        @if ($questions->count() > 0)
            @foreach ($questions as $question)
                <div class="question mb-4">
                    <h5>{!! nl2br(e($question->text)) !!}</h5>
                    <form id="form_{{ $question->id }}" class="options-form">
                        <ul class="list-group mb-3">
                            @foreach ($question->options as $option)
                                <li class="list-group-item">
                                    <input type="radio" name="option_{{ $question->id }}" id="option_{{ $option->id }}"
                                        value="{{ $option->is_correct }}">
                                    <label for="option_{{ $option->id }}">
                                        {!! nl2br(e($option->text)) !!}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </form>
                    <button class="btn btn-info" data-bs-toggle="modal"
                        data-bs-target="#explanationModal_{{ $question->id }}">
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
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {!! nl2br(e($question->explanation->text ?? 'No explanation available.')) !!}
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
        @else
            <p>No questions available for this chapter.</p>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.options-form');
            forms.forEach(form => {
                form.addEventListener('change', function(event) {
                    const selectedOption = event.target;
                    if (selectedOption.type === 'radio') {
                        const isCorrect = selectedOption.value === '1';
                        const listItem = selectedOption.closest('li');

                        // Remove existing styles from all options
                        const options = form.querySelectorAll('li');
                        options.forEach(option => {
                            option.style.backgroundColor = '';
                        });

                        // Apply styles to the selected option
                        if (isCorrect) {
                            listItem.style.backgroundColor = '#42ff4287';
                        } else {
                            listItem.style.backgroundColor = 'rgb(255 75 75 / 59%)';
                        }
                    }
                });
            });
        });
    </script>
@endsection --}}



{{-- @extends('layouts.user.app')

@section('content')
    <div class="container">
        <h3>{!! nl2br(e($subject->name ?? 'Subject name not found')) !!}</h3>
        <h3>{!! nl2br(e($chapter->name ?? 'Chapter name not found')) !!}</h3>

        @if ($questions->count() > 0)
            @foreach ($questions as $question)
                <div class="question mb-4">
                    <h5>{!! nl2br(e($question->text)) !!}</h5>
                    <form id="form_{{ $question->id }}" class="options-form">
                        <ul class="list-group mb-3">
                            @foreach ($question->options as $option)
                                <li class="list-group-item">
                                    <input type="radio" name="option_{{ $question->id }}" id="option_{{ $option->id }}"
                                        value="{{ $option->is_correct }}">
                                    <label for="option_{{ $option->id }}">
                                        {!! nl2br(e($option->text)) !!}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </form>
                    <button class="btn btn-info" data-bs-toggle="modal"
                        data-bs-target="#explanationModal_{{ $question->id }}">
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
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {!! nl2br(e($question->explanation->text ?? 'No explanation available.')) !!}
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
        @else
            <p>No questions available for this chapter.</p>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.options-form');
            forms.forEach(form => {
                form.addEventListener('change', function(event) {
                    const selectedOption = event.target;
                    if (selectedOption.type === 'radio') {
                        const isCorrect = selectedOption.value === '1';
                        const label = selectedOption.nextElementSibling;

                        // Remove existing styles from all options
                        const labels = form.querySelectorAll('label');
                        labels.forEach(label => {
                            label.style.color = '';
                        });

                        // Apply styles to the selected option text
                        if (isCorrect) {
                            label.style.color = 'green';
                        } else {
                            label.style.color = 'red';
                        }
                    }
                });
            });
        });
    </script>
@endsection --}}
@extends('layouts.user.app')

@section('content')
    <div class="container">
        <h3>{!! nl2br(e($subject->name ?? 'Subject name not found')) !!}</h3>
        <h3>{!! nl2br(e($chapter->name ?? 'Chapter name not found')) !!}</h3>

        <!-- Timer -->
        <div id="timer" class="mb-4" style="font-size: 1.5rem; font-weight: bold;">00:00</div>

        @if ($questions->count() > 0)
            @foreach ($questions as $question)
                <div class="question mb-4">
                    <h5>{!! nl2br(e($question->text)) !!}</h5>
                    <form id="form_{{ $question->id }}" class="options-form">
                        <ul class="list-group mb-3">
                            @foreach ($question->options as $option)
                                <li class="list-group-item">
                                    <input type="radio" name="option_{{ $question->id }}" id="option_{{ $option->id }}"
                                        value="{{ $option->is_correct }}">
                                    <label for="option_{{ $option->id }}">
                                        {!! nl2br(e($option->text)) !!}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </form>
                    <button class="btn btn-info" data-bs-toggle="modal"
                        data-bs-target="#explanationModal_{{ $question->id }}">
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
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {!! nl2br(e($question->explanation->text ?? 'No explanation available.')) !!}
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
        @else
            <p>No questions available for this chapter.</p>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Timer
            let timerElement = document.getElementById('timer');
            let seconds = 0;
            let minutes = 0;
            setInterval(function() {
                seconds++;
                if (seconds === 60) {
                    seconds = 0;
                    minutes++;
                }
                let formattedTime = (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') +
                    seconds;
                timerElement.textContent = formattedTime;
            }, 1000);

            // Option selection color change
            const forms = document.querySelectorAll('.options-form');
            forms.forEach(form => {
                form.addEventListener('change', function(event) {
                    const selectedOption = event.target;
                    if (selectedOption.type === 'radio') {
                        const isCorrect = selectedOption.value === '1';
                        const label = selectedOption.nextElementSibling;

                        // Remove existing styles from all options
                        const labels = form.querySelectorAll('label');
                        labels.forEach(label => {
                            label.style.color = '';
                        });

                        // Apply styles to the selected option text
                        if (isCorrect) {
                            label.style.color = 'green';
                        } else {
                            label.style.color = 'red';
                        }
                    }
                });
            });
        });
    </script>
@endsection
