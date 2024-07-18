<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// // app/Models/Explanation.php
// class Explanation extends Model
// {
//     public function question()
//     {
//         return $this->belongsTo(Question::class);
//     }
// }


// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Explanation extends Model
// {
//     public function question()
//     {
//         return $this->belongsTo(Question::class);
//     }

//     public function statement()
//     {
//         return $this->hasOne(Statement::class, 'entity_id')->where('entity_type', 'explanation');
//     }
// }
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
