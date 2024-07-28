<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Chapter;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Statement;
use App\Helpers\TextHelper;
use App\Models\Language;

class OptionController extends Controller
{
    public function index()
    {
        $options = Option::all();
        return view('options.index', compact('options'));
    }


    public function create()
    {
        $languageIds = session('language_ids', [1]); // Default to language ID 1
        $languages = Language::all();

        $subjects = Subject::all();
        $subjects->each(function ($subject) use ($languageIds) {
            $subject->name = TextHelper::getTexts('subject', $subject->id, $languageIds);
        });

        $chapters = Chapter::all();
        $chapters->each(function ($chapter) use ($languageIds) {
            $chapter->name = TextHelper::getTexts('chapter', $chapter->id, $languageIds);
        });

        $questions = Question::with(['statements' => function ($query) use ($languageIds) {
            $query->whereIn('language_id', $languageIds);
        }])->get();

        $questions->each(function ($question) use ($languageIds) {
            $question->text = TextHelper::getTexts('question', $question->id, $languageIds);
        });

        return view('options.create', compact('subjects', 'chapters', 'questions', 'languages'));
    }

    public function store(Request $request)
    {
        $option = new Option();
        $option->question_id = $request->question_id;
        $option->is_correct = $request->is_correct;
        $option->save();

        foreach ($request->translations as $languageId => $text) {
            $statement = new Statement();
            $statement->language_id = $languageId;
            $statement->entity_type = 'option';
            $statement->entity_id = $option->id;
            $statement->text = $text;
            $statement->save();
        }
        return redirect()->route('options.create');
    }
}
