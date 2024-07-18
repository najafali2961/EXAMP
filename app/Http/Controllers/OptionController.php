<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;
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
        $questions = Question::all();
        $languageIds = session('language_ids', [1]); // Default to language ID 1
        $languages = Language::all();
        $questions->each(function ($question) use ($languageIds) {
            $texts = [];
            foreach ($languageIds as $languageId) {
                $text = TextHelper::getText('question', $question->id, $languageId);
                if ($text) {
                    $texts[] = $text;
                }
            }
            $question->text = implode('/', $texts);
        });

        return view('options.create', compact('questions', 'languages'));
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
