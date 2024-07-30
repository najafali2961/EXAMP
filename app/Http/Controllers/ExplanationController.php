<?php

namespace App\Http\Controllers;

use App\Models\Explanation;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Chapter;
use App\Models\Statement;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Helpers\TextHelper;

class ExplanationController extends Controller
{


    public function index()
    {
        $explanations = Explanation::all();
        return view('explanations.index', compact('explanations'));
    }

    public function show($id)
    {
        $languageIds = session('language_ids', [1]); // Default to language ID 1
        $explanation = Explanation::findOrFail($id);
        $texts = [];
        foreach ($languageIds as $languageId) {
            $text = TextHelper::getText('explanation', $explanation->id, $languageId);
            if ($text) {
                $texts[] = $text;
            }
        }
        $explanation->text = implode("\n", $texts);

        return response()->json(['text' => $explanation->text]);
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

        return view('explanations.create', compact('subjects', 'chapters', 'questions', 'languages'));
    }

    // public function create()
    // {
    //     $languageIds = session('language_ids', [1]); // Default to language ID 1
    //     $languages = Language::all();
    //     $questions = Question::with(['statements' => function ($query) use ($languageIds) {
    //         $query->whereIn('language_id', $languageIds);
    //     }])->get();

    //     $questions->each(function ($question) use ($languageIds) {
    //         $texts = [];
    //         foreach ($languageIds as $languageId) {
    //             $text = TextHelper::getText('question', $question->id, $languageId);
    //             if ($text) {
    //                 $texts[] = $text;
    //             }
    //         }
    //         $question->text = implode('/', $texts);
    //     });

    //     return view('explanations.create', compact('questions', 'languages'));
    // }

    public function store(Request $request)
    {
        $explanation = new Explanation();
        $explanation->question_id = $request->question_id;
        $explanation->save();

        $languages = Language::all();
        foreach ($languages as $language) {
            $fieldName = 'text_' . $language->code;
            if ($request->has($fieldName)) {
                $statement = new Statement();
                $statement->language_id = $language->id;
                $statement->entity_type = 'explanation';
                $statement->entity_id = $explanation->id;
                $statement->text = $request->$fieldName;
                $statement->save();
            }
        }

        return redirect()->route('explanations.create');
    }
}
