<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Statement.php
class Statement extends Model
{
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
