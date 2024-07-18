<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Language.php
class Language extends Model
{
    public function statements()
    {
        return $this->hasMany(Statement::class);
    }
}
