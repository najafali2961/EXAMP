<?php
// database/seeders/OptionSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Option;
use App\Models\Statement;

class OptionSeeder extends Seeder
{
    public function run()
    {
        $options = [
            ['id' => 1, 'question_id' => 1, 'is_correct' => true],
            ['id' => 2, 'question_id' => 1, 'is_correct' => false],
            ['id' => 3, 'question_id' => 2, 'is_correct' => true],
            ['id' => 4, 'question_id' => 2, 'is_correct' => false],
        ];

        foreach ($options as $option) {
            Option::create($option);

            Statement::create([
                'language_id' => 1,
                'entity_type' => 'option',
                'entity_id' => $option['id'],
                'text' => 'Option ' . $option['id'] . ' in English'
            ]);
            Statement::create([
                'language_id' => 2,
                'entity_type' => 'option',
                'entity_id' => $option['id'],
                'text' => 'Opción ' . $option['id'] . ' en Español'
            ]);
        }
    }
}
