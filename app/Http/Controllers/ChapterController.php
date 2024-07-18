<?php
// app/Http/Controllers/ChapterController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Subject;
use App\Models\Statement;
use App\Helpers\TextHelper;
use App\Models\Language;

class ChapterController extends Controller
{


    public function index($subjectId)
    {
        $languageIds = session('language_ids', [1]); // Default to language ID 1

        // Retrieve the subject and get its name in the required languages
        $subject = Subject::findOrFail($subjectId);
        $subjectTexts = [];
        foreach ($languageIds as $languageId) {
            $text = TextHelper::getText('subject', $subject->id, $languageId);
            if ($text) {
                $subjectTexts[] = $text;
            }
        }
        $subject->name = implode('/', $subjectTexts);

        // Retrieve the chapters and get their names in the required languages
        $chapters = Chapter::where('subject_id', $subjectId)->get();
        $chapters->each(function ($chapter) use ($languageIds) {
            $texts = [];
            foreach ($languageIds as $languageId) {
                $text = TextHelper::getText('chapter', $chapter->id, $languageId);
                if ($text) {
                    $texts[] = $text;
                }
            }
            $chapter->name = implode('/', $texts);
        });

        return view('chapters.index', compact('chapters', 'subject'));
    }
    public function create()
    {
        $subjects = Subject::all();
        $languages = Language::all();
        $subjects->each(function ($subject) {
            $subject->name = TextHelper::getText('subject', $subject->id, 1); // Default to English
        });
        return view('chapters.create', compact('subjects', 'languages'));
    }
    public function store(Request $request)
    {
        $chapter = new Chapter();
        $chapter->subject_id = $request->subject_id;
        $chapter->save();
        foreach ($request->translations as $languageId => $text) {
            $statement = new Statement();
            $statement->language_id = $languageId;
            $statement->entity_type = 'chapter';
            $statement->entity_id = $chapter->id;
            $statement->text = $text;
            $statement->save();
        }

        return redirect()->route('chapters.create');
    }
}
