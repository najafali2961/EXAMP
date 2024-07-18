<?php

// database/seeders/LanguageSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    public function run()
    {
        Language::create(['code' => 'en', 'name' => 'English']);
        Language::create(['code' => 'es', 'name' => 'Spanish']);
    }
}
