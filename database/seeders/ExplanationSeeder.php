<?php
// database/seeders/ExplanationSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Explanation;
use App\Models\Statement;

class ExplanationSeeder extends Seeder
{
    public function run()
    {
        $explanations = [
            ['id' => 1, 'question_id' => 1],
            ['id' => 2, 'question_id' => 2],
        ];

        foreach ($explanations as $explanation) {
            Explanation::create($explanation);

            Statement::create([
                'language_id' => 1,
                'entity_type' => 'explanation',
                'entity_id' => $explanation['id'],
                'text' => 'Explanation ' . $explanation['id'] . ' in English'
            ]);
            Statement::create([
                'language_id' => 2,
                'entity_type' => 'explanation',
                'entity_id' => $explanation['id'],
                'text' => 'Explicación ' . $explanation['id'] . ' en Español'
            ]);
        }
    }
}
