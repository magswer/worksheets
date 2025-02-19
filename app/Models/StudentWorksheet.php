<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentWorksheet extends Model
{
    protected $fillable = [
        'workksheet_id',
        'student_id',
        'is_completed',
        'completed_at',
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

