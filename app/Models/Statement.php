<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Statement.php
class Statement extends Model
{
    use HasFactory;

    // Add the attributes that you want to allow mass assignment for
    protected $fillable = [
        'language_id',
        'entity_type',
        'entity_id',
        'text',
    ];
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
