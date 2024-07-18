<?php
// app/Http/Controllers/SubjectController.php
namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Statement;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Helpers\TextHelper;

class SubjectController extends Controller
{
    // public function index()
    // {
    //     $languageId = session('language_id', 1); // Default to language ID 1
    //     $subjects = Subject::all();
    //     $subjects->each(function ($subject) use ($languageId) {
    //         $subject->name = TextHelper::getText('subject', $subject->id, $languageId);
    //     });
    //     return view('subjects.index', compact('subjects'));
    // }
    public function index()
    {
        $languageIds = session('language_ids', [1]); // Default to language ID 1
        $subjects = Subject::all();
        $subjects->each(function ($subject) use ($languageIds) {
            $texts = [];
            foreach ($languageIds as $languageId) {
                $text = TextHelper::getText('subject', $subject->id, $languageId);
                if ($text) {
                    $texts[] = $text;
                }
            }
            $subject->name = implode('/', $texts);
        });
        return view('subjects.index', compact('subjects'));
    }
    public function create()
    {
        $languages = Language::all();
        return view('subjects.create', compact('languages'));
    }

    public function store(Request $request)
    {
        $subject = new Subject();
        $subject->save();

        $languages = Language::all();
        foreach ($languages as $language) {
            $fieldName = 'name_' . $language->code;
            if ($request->has($fieldName)) {
                $statement = new Statement();
                $statement->language_id = $language->id;
                $statement->entity_type = 'subject';
                $statement->entity_id = $subject->id;
                $statement->text = $request->$fieldName;
                $statement->save();
            }
        }

        return redirect()->route('subjects.create');
    }
}
