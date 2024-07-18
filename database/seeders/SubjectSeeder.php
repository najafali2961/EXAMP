<?php

// database/seeders/SubjectSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        Subject::create(['id' => 1]); // Example subject
    }
}
