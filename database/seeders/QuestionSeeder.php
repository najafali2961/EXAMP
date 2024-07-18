<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Statement;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            ['id' => 1, 'chapter_id' => 1],
            ['id' => 2, 'chapter_id' => 1],
        ];

        foreach ($questions as $question) {
            Question::create($question);

            Statement::create([
                'language_id' => 1,
                'entity_type' => 'question',
                'entity_id' => $question['id'],
                'text' => 'Question ' . $question['id'] . ' in English'
            ]);
            Statement::create([
                'language_id' => 2,
                'entity_type' => 'question',
                'entity_id' => $question['id'],
                'text' => 'Pregunta ' . $question['id'] . ' en Español'
            ]);
        }
    }
}
