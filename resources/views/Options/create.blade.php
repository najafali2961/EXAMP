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
                    <label class="form-label" for="subject_id">Select Subject</label>
                    <select class="form-select" id="subject_id" name="subject_id" required>
                        <option value="">Select Subject</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="chapter_id">Select Chapter</label>
                    <select class="form-select" id="chapter_id" name="chapter_id" required>
                        <option value="">Select Chapter</option>
                        @foreach ($chapters as $chapter)
                            <option value="{{ $chapter->id }}" data-subject="{{ $chapter->subject_id }}">
                                {{ $chapter->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="question_id">Select Question</label>
                    <select class="form-select" id="question_id" name="question_id" required>
                        <option value="">Select Question</option>
                        @foreach ($questions as $question)
                            <option value="{{ $question->id }}" data-chapter="{{ $question->chapter_id }}">
                                {{ $question->text }}
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const subjectDropdown = document.getElementById('subject_id');
            const chapterDropdown = document.getElementById('chapter_id');
            const questionDropdown = document.getElementById('question_id');

            function filterChapters() {
                const selectedSubject = subjectDropdown.value;
                const chapters = chapterDropdown.querySelectorAll('option[data-subject]');

                chapters.forEach(chapter => {
                    if (chapter.dataset.subject === selectedSubject) {
                        chapter.style.display = 'block';
                    } else {
                        chapter.style.display = 'none';
                    }
                });

                chapterDropdown.value = '';
                chapterDropdown.disabled = selectedSubject === '';
                filterQuestions();
            }

            function filterQuestions() {
                const selectedChapter = chapterDropdown.value;
                const questions = questionDropdown.querySelectorAll('option[data-chapter]');

                questions.forEach(question => {
                    if (question.dataset.chapter === selectedChapter) {
                        question.style.display = 'block';
                    } else {
                        question.style.display = 'none';
                    }
                });

                questionDropdown.value = '';
                questionDropdown.disabled = selectedChapter === '';
            }

            subjectDropdown.addEventListener('change', filterChapters);
            chapterDropdown.addEventListener('change', filterQuestions);
            filterChapters(); // Initialize the chapter and question dropdown state
        });
    </script>
@endsection
