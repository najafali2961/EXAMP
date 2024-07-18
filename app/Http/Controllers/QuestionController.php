<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Subject;
use App\Models\Chapter;
use App\Models\Statement;
use Illuminate\Http\Request;
use App\Helpers\TextHelper;
use App\Models\Language;

class QuestionController extends Controller
{
    public function index($chapterId)
    {
        $languageIds = session('language_ids', [1]); // Default to language ID 1
        $chapter = Chapter::findOrFail($chapterId);
        $chapter->name = TextHelper::getText('chapter', $chapter->id, $languageIds);

        $subject = $chapter->subject;
        $subject->name = TextHelper::getText('subject', $subject->id, $languageIds);

        $questions = Question::where('chapter_id', $chapterId)->paginate(1);
        $questions->each(function ($question) use ($languageIds) {
            $texts = [];
            foreach ($languageIds as $languageId) {
                $text = TextHelper::getText('question', $question->id, $languageId);
                if ($text) {
                    $texts[] = $text;
                }
            }
            $question->text = implode("\n", $texts);
            $question->options->each(function ($option) use ($languageIds) {
                $texts = [];
                foreach ($languageIds as $languageId) {
                    $text = TextHelper::getText('option', $option->id, $languageId);
                    if ($text) {
                        $texts[] = $text;
                    }
                }
                $option->text = implode("\n", $texts);
            });
            if ($question->explanation) {
                $texts = [];
                foreach ($languageIds as $languageId) {
                    $text = TextHelper::getText('explanation', $question->explanation->id, $languageId);
                    if ($text) {
                        $texts[] = $text;
                    }
                }
                $question->explanation->text = implode("\n", $texts);
            }
        });

        return view('questions.index', compact('questions', 'chapter', 'subject'));
    }

    public function show($questionId)
    {
        $languageIds = session('language_ids', [1]); // Default to language ID 1
        $question = Question::findOrFail($questionId);
        $texts = [];
        foreach ($languageIds as $languageId) {
            $text = TextHelper::getText('question', $question->id, $languageId);
            if ($text) {
                $texts[] = $text;
            }
        }
        $question->text = implode("\n", $texts);
        $question->options->each(function ($option) use ($languageIds) {
            $texts = [];
            foreach ($languageIds as $languageId) {
                $text = TextHelper::getText('option', $option->id, $languageId);
                if ($text) {
                    $texts[] = $text;
                }
            }
            $option->text = implode("\n", $texts);
        });
        if ($question->explanation) {
            $texts = [];
            foreach ($languageIds as $languageId) {
                $text = TextHelper::getText('explanation', $question->explanation->id, $languageId);
                if ($text) {
                    $texts[] = $text;
                }
            }
            $question->explanation->text = implode("\n", $texts);
        }

        $chapter = $question->chapter;
        $chapter->name = TextHelper::getText('chapter', $chapter->id, $languageIds);

        $subject = $chapter->subject;
        $subject->name = TextHelper::getText('subject', $subject->id, $languageIds);

        return view('questions.show', compact('question', 'chapter', 'subject'));
    }

    public function getChapters($subjectId)
    {
        $languageIds = session('language_ids', [1]); // Default to language ID 1
        $chapters = Chapter::where('subject_id', $subjectId)->get();
        $chapters->each(function ($chapter) use ($languageIds) {
            $texts = [];
            foreach ($languageIds as $languageId) {
                $text = TextHelper::getText('chapter', $chapter->id, $languageId);
                if ($text) {
                    $texts[] = $text;
                }
            }
            $chapter->name = implode("\n", $texts);
        });

        return response()->json($chapters);
    }

    public function create()
    {
        $chapters = Chapter::all();
        $languages = Language::all();
        $chapters->each(function ($chapter) {
            $chapter->name = TextHelper::getText('chapter', $chapter->id, 1); // Default to English
        });
        return view('questions.create', compact('chapters', 'languages'));
    }

    public function store(Request $request)
    {
        $question = new Question();
        $question->chapter_id = $request->chapter_id;
        $question->save();

        foreach ($request->translations as $languageId => $text) {
            $statement = new Statement();
            $statement->language_id = $languageId;
            $statement->entity_type = 'question';
            $statement->entity_id = $question->id;
            $statement->text = $text;
            $statement->save();
        }
        return redirect()->route('questions.create');
    }
}
