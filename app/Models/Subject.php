<?php
// app/Models/Subject.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
    public function statements()
    {
        return $this->morphMany(Statement::class, 'entity');
    }
}
