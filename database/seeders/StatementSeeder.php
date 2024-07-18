<?php

// database/seeders/StatementSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Statement;

class StatementSeeder extends Seeder
{
    public function run()
    {
        // Example statements for subjects
        Statement::create([
            'language_id' => 1, // English
            'entity_type' => 'subject',
            'entity_id' => 1,
            'text' => 'Mathematics'
        ]);
        Statement::create([
            'language_id' => 2, // Spanish
            'entity_type' => 'subject',
            'entity_id' => 1,
            'text' => 'Matemáticas'
        ]);

        // Example statements for chapters
        Statement::create([
            'language_id' => 1, // English
            'entity_type' => 'chapter',
            'entity_id' => 1,
            'text' => 'Algebra'
        ]);
        Statement::create([
            'language_id' => 2, // Spanish
            'entity_type' => 'chapter',
            'entity_id' => 1,
            'text' => 'Álgebra'
        ]);
    }
}
