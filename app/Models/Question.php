<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function statements()
    {
        return $this->hasMany(Statement::class, 'entity_id')->where('entity_type', 'question');
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }


    public function explanation()
    {
        return $this->hasOne(Explanation::class);
    }
}
