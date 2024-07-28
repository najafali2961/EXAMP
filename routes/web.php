<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\ExplanationController;

//Subjects Routes
Route::get('/subjects', [SubjectController::class, 'index']);
Route::get('/subjects/{subject}/chapters', [ChapterController::class, 'index']);
Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');

// Chapters Routes
Route::get('/chapters/{chapter}/questions', [QuestionController::class, 'index'])->name('chapters.index');
Route::get('/chapters/create', [ChapterController::class, 'create'])->name('chapters.create');
Route::post('/chapters', [ChapterController::class, 'store'])->name('chapters.store');

// Questions Routes
Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
Route::get('/questions/{question}', [QuestionController::class, 'show'])->name('questions.show');
Route::get('/chapters/{chapterId}/questions/{questionIndex?}', [QuestionController::class, 'index'])->name('questions.index');

Route::get('/chapters/{subjectId}', [QuestionController::class, 'getChapters'])->name('chapters.index');
Route::get('/questions/{chapterId}', [QuestionController::class, 'index'])->name('questions.index');
Route::get('/questions/show/{questionId}', [QuestionController::class, 'show'])->name('questions.show');

// Languages Routes
Route::get('/language/{language}', [LanguageController::class, 'changeLanguage']);
Route::get('/languages/create', [LanguageController::class, 'create'])->name('languages.create');
Route::post('/languages', [LanguageController::class, 'store'])->name('languages.store');
Route::post('change-languages', [LanguageController::class, 'changeLanguages'])->name('change.languages');

// Options Routes
Route::get('/options/create', [OptionController::class, 'create'])->name('options.create');
Route::post('/options', [OptionController::class, 'store'])->name('options.store');

// Explanations Routes
Route::get('explanations', [ExplanationController::class, 'index'])->name('explanations.index');
Route::get('explanations/create', [ExplanationController::class, 'create'])->name('explanations.create');
Route::post('explanations', [ExplanationController::class, 'store'])->name('explanations.store');
