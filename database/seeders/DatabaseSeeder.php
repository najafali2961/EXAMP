<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            LanguageSeeder::class,
            StatementSeeder::class,
            SubjectSeeder::class,
            ChapterSeeder::class,
            QuestionSeeder::class,
            OptionSeeder::class,
            ExplanationSeeder::class,

        ]);
    }
}
