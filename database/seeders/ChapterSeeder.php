<?php
// database/seeders/ChapterSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;
use App\Models\Statement;

class ChapterSeeder extends Seeder
{
    public function run()
    {
        $chapters = [
            ['id' => 1, 'subject_id' => 1],
            ['id' => 2, 'subject_id' => 1],
        ];

        foreach ($chapters as $chapter) {
            Chapter::create($chapter);

            Statement::create([
                'language_id' => 1,
                'entity_type' => 'chapter',
                'entity_id' => $chapter['id'],
                'text' => 'Chapter ' . $chapter['id'] . ' in English'
            ]);
            Statement::create([
                'language_id' => 2,
                'entity_type' => 'chapter',
                'entity_id' => $chapter['id'],
                'text' => 'Capítulo ' . $chapter['id'] . ' en Español'
            ]);
        }
    }
}
