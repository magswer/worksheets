<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'workksheet_id',
        'student_id',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function worksheet()
    {
        return $this->belongsTo(Worksheet::class);
    }
}

