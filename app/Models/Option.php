<?php
// app/Models/Option.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Option extends Model
{
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function statements()
    {
        return $this->morphMany(Statement::class, 'entity');
    }
}
