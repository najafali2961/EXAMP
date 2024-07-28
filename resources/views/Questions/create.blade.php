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
                    <label class="form-label" for="subject_id">Subject</label>
                    <select class="form-select" id="subject_id" name="subject_id" required>
                        <option value="">Select Subject</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="chapter_id">Chapter</label>
                    <select class="form-select" id="chapter_id" name="chapter_id" required>
                        <option value="">Select Chapter</option>
                        @foreach ($chapters as $chapter)
                            <option value="{{ $chapter->id }}" data-subject="{{ $chapter->subject_id }}">
                                {{ $chapter->name }}</option>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const subjectDropdown = document.getElementById('subject_id');
            const chapterDropdown = document.getElementById('chapter_id');

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
                if (selectedSubject === '') {
                    chapterDropdown.disabled = true;
                } else {
                    chapterDropdown.disabled = false;
                }
            }

            subjectDropdown.addEventListener('change', filterChapters);
            filterChapters(); // Initialize the chapter dropdown state
        });
    </script>
@endsection
