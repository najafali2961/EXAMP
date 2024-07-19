<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Explanation extends Model
{
    use HasFactory;

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function statement()
    {
        return $this->hasOne(Statement::class, 'entity_id')->where('entity_type', 'explanation');
    }
}
