<?php
// app/Http/Controllers/LanguageController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{

    public function changeLanguages(Request $request)
    {
        $languageIds = $request->input('languages', []);
        session(['language_ids' => array_slice($languageIds, 0, 2)]); // Store up to 2 languages in session
        return redirect()->back();
    }
    public function create()
    {
        return view('languages.create');
    }

    public function store(Request $request)
    {
        $language = new Language();
        $language->code = $request->code;
        $language->name = $request->name;
        $language->save();

        return redirect()->route('languages.create');
    }
}
